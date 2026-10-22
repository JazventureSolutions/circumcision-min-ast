<?php

namespace Tests\Feature;

use App\Models\User;
use App\Helpers\TotpHelper;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_password_login_requires_authenticator_setup_before_access()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertRedirect(route('2fa.setup'));
        $this->assertSame($user->id, session('2fa:setup:user:id'));
    }

    public function test_mfa_enabled_users_must_verify_totp_before_authentication()
    {
        $user = User::factory()->create([
            'two_factor_enabled' => true,
            'two_factor_secret' => TotpHelper::generateSecret(),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertRedirect(route('2fa.challenge'));

        $this->post('/two-factor', [
            'code' => TotpHelper::getCode($user->two_factor_secret),
        ])->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticatedAs($user);
        $this->assertSame($user->id, session('mfa:verified:user:id'));
    }

    public function test_mfa_enabled_user_without_a_secret_cannot_fall_back_to_password_login()
    {
        $user = User::factory()->create([
            'two_factor_enabled' => true,
            'two_factor_secret' => null,
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_authenticated_session_without_mfa_marker_is_rejected()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
