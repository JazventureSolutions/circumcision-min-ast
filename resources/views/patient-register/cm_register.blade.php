@extends('layouts.default-simple')

@section('content')
    <div class="card">
        <!--begin::Card body-->
        <div class="card-body">

            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="{{ url('/') }}/logo.jpg" style="display: block;margin: auto;" />
            </a>
            <h3 class="text-center mt-4">Cosmetic Medical Patient Registration</h3>
            {{-- <div class="card mt-6">
            <div class="card-body PatientTypeText">
                IN CASE OF CHILDREN: Please remember both parents must attend clinic on the day of procedure. We need photo ID documents for both parents and ID for the child such as birth certificate, red book, hospital bands, passport, resident permit. We will not perform any procedure if the above are not provided on the day.
            </div>
        </div> --}}

            <form id="kt_form" class="form" method="POST" action="{{ url()->current() }}">
                @csrf
                <!--begin::Row-->
                <h3
                    style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                    Personal Details</h3>
                <div class="row">
                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control form-control-lg " name="title" value=""
                                placeholder="Title">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control form-control-lg " name="first_name" value=""
                                placeholder="First name">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Surname</label>
                            <input type="text" class="form-control form-control-lg " name="sur_name" value=""
                                placeholder="Surname">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Date of birth</label>
                            <input class="form-control form-control-lg " type="date" name="date_of_birth"
                                placeholder="Date of birth">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Telephone number(s)</label>
                            <div class="input-group input-group-lg ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="la la-phone"></i>
                                    </span>
                                </div>
                                <input type="tel" class="form-control form-control-lg " name="cell_number"
                                    value="" placeholder="Telephone number(s)">
                            </div>
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control form-control-lg " name="address" value=""
                                placeholder="Address">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Postcode</label>
                            <input type="text" class="form-control form-control-lg " name="postcode" value=""
                                placeholder="Postcode">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg " name="email" value=""
                                placeholder="Email">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">GP Name and address</label>
                            <input type="text" class="form-control form-control-lg " name="gp_name_and_address"
                                value="" placeholder="GP Name and address">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Describe your occupation</label>
                            <input type="text" class="form-control form-control-lg " name="occupation_details"
                                value="" placeholder="Describe your occupation">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">How did you hear about us</label>
                            <input type="text" class="form-control form-control-lg " name="hear_about_us"
                                value="" placeholder="How did you hear about us">
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">Describe your beauty concern and expectations from the
                                treatment</label>
                            <textarea type="text" class="form-control form-control-lg " name="beauty_concern_details" rows="2">{{ old('beauty_concern_details', $cosmetic_patient_form->beauty_concern_details ?? '') }}</textarea>
                        </div>
                        <!--end::Group-->
                    </div>


                    <h3
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Medical History</h3>
                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you currently receiving treatment from a doctor or specialist?</p>
                            <fieldset id="receiving_treatment" style="min-width: 102px;">
                                <input type="radio" id="receiving_treatment_Yes" value="Yes"
                                    name="receiving_treatment"><label for="receiving_treatment_Yes">Yes</label>&nbsp;
                                <input type="radio" id="receiving_treatment_No" value="No"
                                    name="receiving_treatment" checked><label for="receiving_treatment_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg " name="receiving_treatment_detail"
                                value="" placeholder="Please give details">
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you taking any medicines? (Fish Oil, Ginko, ginseng, Vitamin E, St John Wart, Roacutane,
                                Steroids, Aspirin, Ibuprofen, , Steroids, Anticoagulants, , Antibiotics, Contraceptive Pill,
                                HRT, Thiazides, Phenothiazines, Tetracyclines, Ciprofloxacin, Diuretics)</p>
                            <fieldset id="taking_medicines" style="min-width: 102px;">
                                <input type="radio" id="taking_medicines_Yes" value="Yes"
                                    name="taking_medicines"><label for="taking_medicines_Yes">Yes</label>&nbsp;
                                <input type="radio" id="taking_medicines_No" value="No" name="taking_medicines"
                                    checked><label for="taking_medicines_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg medical-history-detail" name="taking_medicines_detail"
                                value="" placeholder="Please give details" id="taking_medicines_detail">
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you allergic to any medicines, foods or other substances? (e.g. Egg whites, fillers,
                                chemical peels, cosmetics)</p>
                            <fieldset id="allergic_to_medicines" style="min-width: 102px;">
                                <input type="radio" id="allergic_to_medicines_Yes" value="Yes"
                                    name="allergic_to_medicines"><label for="allergic_to_medicines_Yes">Yes</label>&nbsp;
                                <input type="radio" id="allergic_to_medicines_No" value="No"
                                    name="allergic_to_medicines" checked><label for="allergic_to_medicines_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg medical-history-detail"
                                name="allergic_to_medicines_detail" value="" placeholder="Please give details" id="allergic_to_medicines_detail">
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Have you ever had an anaphylactic reaction?</p>
                            <fieldset id="anaphylactic_reaction" style="min-width: 102px;">
                                <input type="radio" id="anaphylactic_reaction_Yes" value="Yes"
                                    name="anaphylactic_reaction"><label for="anaphylactic_reaction_Yes">Yes</label>&nbsp;
                                <input type="radio" id="anaphylactic_reaction_No" value="No"
                                    name="anaphylactic_reaction" checked><label for="anaphylactic_reaction_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg medical-history-detail"
                                name="anaphylactic_reaction_detail" value="" placeholder="Please give details" id="anaphylactic_reaction_detail">
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you currently pregnant or contemplating pregnancy / Breastfeeding ?</p>
                            <fieldset id="pregnant" style="min-width: 102px;">
                                <input type="radio" id="pregnant_Yes" value="Yes" name="pregnant"><label
                                    for="pregnant_Yes">Yes</label>&nbsp;
                                <input type="radio" id="pregnant_No" value="No" name="pregnant" checked><label
                                    for="pregnant_No" checked>No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>


                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Medical History (Contd)</h3>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Depression/stress/Body Dysmorphia/ Psychiatric problems</p>
                            <fieldset id="Depression" style="min-width: 102px;">
                                <input type="radio" id="depression_Yes" value="Yes" name="Depression"><label
                                    for="depression_Yes">Yes</label>&nbsp;
                                <input type="radio" id="depression_No" value="No" name="Depression" checked><label
                                    for="depression_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Heart/Respiratory problems</p>
                            <fieldset id="heart_problems" style="min-width: 102px;">
                                <input type="radio" id="heart_problems_Yes" value="Yes"
                                    name="heart_problems"><label for="heart_problems_Yes">Yes</label>&nbsp;
                                <input type="radio" id="heart_problems_No" value="No" name="heart_problems"
                                    checked><label for="heart_problems_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Fainting/Epilepsy/Stroke</p>
                            <fieldset id="epilepsy" style="min-width: 102px;">
                                <input type="radio" id="epilepsy_Yes" value="Yes" name="epilepsy"><label
                                    for="epilepsy_Yes">Yes</label>&nbsp;
                                <input type="radio" id="epilepsy_No" value="No" name="epilepsy" checked><label
                                    for="epilepsy_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>High Blood Pressure</p>
                            <fieldset id="blood_pressure" style="min-width: 102px;">
                                <input type="radio" id="blood_pressure_Yes" value="Yes"
                                    name="blood_pressure"><label for="blood_pressure_Yes">Yes</label>&nbsp;
                                <input type="radio" id="blood_pressure_No" value="No" name="blood_pressure"
                                    checked><label for="blood_pressure_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Diabetes</p>
                            <fieldset id="diabetes" style="min-width: 102px;">
                                <input type="radio" id="diabetes_Yes" value="Yes" name="diabetes"><label
                                    for="diabetes_Yes">Yes</label>&nbsp;
                                <input type="radio" id="diabetes_No" value="No" name="diabetes" checked><label
                                    for="diabetes_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Thyroid/Liver/Kidney problems</p>
                            <fieldset id="kidney_problems" style="min-width: 102px;">
                                <input type="radio" id="kidney_problems_Yes" value="Yes"
                                    name="kidney_problems"><label for="kidney_problems_Yes">Yes</label>&nbsp;
                                <input type="radio" id="kidney_problems_No" value="No" name="kidney_problems"
                                    checked><label for="kidney_problems_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Cancer/Skin Cancer</p>
                            <fieldset id="Skin_Cancer" style="min-width: 102px;">
                                <input type="radio" id="Skin_Cancer_Yes" value="Yes" name="Skin_Cancer"><label
                                    for="Skin_Cancer_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Skin_Cancer_No" value="No" name="Skin_Cancer"
                                    checked><label for="Skin_Cancern_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Blood disorders/Easy bruising</p>
                            <fieldset id="Blood_Disorders" style="min-width: 102px;">
                                <input type="radio" id="Blood_Disorders_Yes" value="Yes"
                                    name="Blood_Disorders"><label for="Blood_Disorders_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Blood_Disorders_No" value="No" name="Blood_Disorders"
                                    checked><label for="Blood_Disorders_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Keloids/bad scarring</p>
                            <fieldset id="Keloids" style="min-width: 102px;">
                                <input type="radio" id="Keloids_Yes" value="Yes" name="Keloids"><label
                                    for="Keloids_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Keloids_No" value="No" name="Keloids" checked><label
                                    for="Keloids_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Arthritis/Autoimmune disease</p>
                            <fieldset id="Arthritis" style="min-width: 102px;">
                                <input type="radio" id="Arthritis_Yes" value="Yes" name="Arthritis"><label
                                    for="Arthritis_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Arthritis_No" value="No" name="Arthritis" checked><label
                                    for="Arthritis_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Cold Sores</p>
                            <fieldset id="Cold_Sores" style="min-width: 102px;">
                                <input type="radio" id="Cold_Sores_Yes" value="Yes" name="Cold_Sores"><label
                                    for="Cold_Sores_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Cold_Sores_No" value="No" name="Cold_Sores" checked><label
                                    for="Cold_Sores_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>HIV / Hepatitis</p>
                            <fieldset id="Hepatitis" style="min-width: 102px;">
                                <input type="radio" id="Hepatitis_Yes" value="Yes" name="Hepatitis"><label
                                    for="Hepatitis_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Hepatitis_No" value="No" name="Hepatitis" checked><label
                                    for="Hepatitis_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Dermatitis/Eczema/Psoriasis</p>
                            <fieldset id="Psoriasis" style="min-width: 102px;">
                                <input type="radio" id="Psoriasis_Yes" value="Yes" name="Psoriasis"><label
                                    for="Psoriasis_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Psoriasis_No" value="No" name="Psoriasis" checked><label
                                    for="Psoriasis_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Skin infection/Acne</p>
                            <fieldset id="Skin_Infection" style="min-width: 102px;">
                                <input type="radio" id="Skin_Infection_Yes" value="Yes"
                                    name="Skin_Infection"><label for="Skin_Infection_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Skin_Infection_No" value="No" name="Skin_Infection"
                                    checked><label for="Skin_Infection_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>


                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Leg Thread Veins</h3>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Ankle swelling</p>
                            <fieldset id="Ankle_Swelling" style="min-width: 102px;">
                                <input type="radio" id="Ankle_Swelling_Yes" value="Yes"
                                    name="Ankle_Swelling"><label for="Ankle_Swelling_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Ankle_Swelling_No" value="No" name="Ankle_Swelling"
                                    checked><label for="Ankle_Swelling_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Cellulitis</p>
                            <fieldset id="Cellulitis" style="min-width: 102px;">
                                <input type="radio" id="Cellulitis_Yes" value="Yes" name="Cellulitis"><label
                                    for="Cellulitis_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Cellulitis_No" value="No" name="Cellulitis" checked><label
                                    for="Cellulitis_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Phlebitis</p>
                            <fieldset id="Phlebitis" style="min-width: 102px;">
                                <input type="radio" id="Phlebitis_Yes" value="Yes" name="Phlebitis"><label
                                    for="Phlebitis_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Phlebitis_No" value="No" name="Phlebitis" checked><label
                                    for="PhlebitisNo">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Varicose Veins</p>
                            <fieldset id="Varicose_Veins" style="min-width: 102px;">
                                <input type="radio" id="Varicose_Veins_Yes" value="Yes"
                                    name="Varicose_Veins"><label for="Varicose_Veins_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Varicose_Veins_No" value="No" name="Varicose_Veins"
                                    checked><label for="Varicose_Veins_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Deep vein thrombosis</p>
                            <fieldset id="Deep_Vein" style="min-width: 102px;">
                                <input type="radio" id="Deep_Vein_Yes" value="Yes" name="Deep_Vein"><label
                                    for="Deep_Vein_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Deep_Vein_No" value="No" name="Deep_Vein" checked><label
                                    for="Deep_Vein_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Pulmonary embolus</p>
                            <fieldset id="Pulmonary_Embolus" style="min-width: 102px;">
                                <input type="radio" id="Pulmonary_Embolus_Yes" value="Yes"
                                    name="Pulmonary_Embolus"><label for="Pulmonary_Embolus_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Pulmonary_Embolus_No" value="No" name="Pulmonary_Embolus"
                                    checked><label for="Pulmonary_Embolus_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Leg ulceration</p>
                            <fieldset id="Leg_Ulceration" style="min-width: 102px;">
                                <input type="radio" id="Leg_Ulceration_Yes" value="Yes"
                                    name="Leg_Ulceration"><label for="Leg_Ulceration_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Leg_Ulceration_No" value="No" name="Leg_Ulceration"
                                    checked><label for="Leg_Ulceration_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-6">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Spider Veins/Visible leg veins</p>
                            <fieldset id="Spider_Veins" style="min-width: 102px;">
                                <input type="radio" id="Spider_Veins_Yes" value="Yes" name="Spider_Veins"><label
                                    for="Spider_Veins_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Spider_Veins_No" value="No" name="Spider_Veins"
                                    checked><label for="Spider_Veins_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>

                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Other Information</h3>
                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Any surgical procedures in the past?</p>
                            <fieldset id="past_surgery" style="min-width: 102px;">
                                <input type="radio" id="past_surgery_Yes" value="Yes" name="past_surgery"><label
                                    for="past_surgery_Yes">Yes</label>&nbsp;
                                <input type="radio" id="past_surgery_No" value="No" name="past_surgery"
                                    checked><label for="past_surgery_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg " name="past_surgery_detail"
                                value="" placeholder="Please give details">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Do you have any Dental or other Implants? (plates/screws/rods/pacemaker/inner ear implant)
                            </p>
                            <fieldset id="dental_implants" style="min-width: 102px;">
                                <input type="radio" id="dental_implants_Yes" value="Yes"
                                    name="dental_implants"><label for="dental_implants_Yes">Yes</label>&nbsp;
                                <input type="radio" id="dental_implants_No" value="No" name="dental_implants"
                                    checked><label for="dental_implants_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If YES, please give details:</label>
                            <input type="text" class="form-control form-control-lg " name="dental_implants_detail"
                                value="" placeholder="Please give details">
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Can your GP be informed about your treatment?</p>
                            <fieldset id="gb_informed" style="min-width: 102px;">
                                <input type="radio" id="gb_informed_Yes" value="Yes" name="gb_informed"><label
                                    for="gb_informed_Yes">Yes</label>&nbsp;
                                <input type="radio" id="gb_informed_No" value="No" name="gb_informed"
                                    checked><label for="gb_informed_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Do you smoke?</p>
                            <fieldset id="smoke" style="min-width: 102px;">
                                <input type="radio" id="smoke_Yes" value="Yes" name="smoke"><label
                                    for="smoke_Yes">Yes</label>&nbsp;
                                <input type="radio" id="smoke_No" value="No" name="smoke" checked><label
                                    for="smoke_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Do you take alcohol?</p>
                            <fieldset id="alcohol" style="min-width: 102px;">
                                <input type="radio" id="alcohol_Yes" value="Yes" name="alcohol"><label
                                    for="alcohol_Yes">Yes</label>&nbsp;
                                <input type="radio" id="alcohol_No" value="No" name="alcohol" checked><label
                                    for="alcohol_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="form-group">
                            <label class="form-label">If yes, how many units per week?:</label>
                            <input type="text" class="form-control form-control-lg " name="alcohol_detail"
                                value="" placeholder="Please give details">
                        </div>
                        <!--end::Group-->

                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>In the last 6 months: any sunbathing/sun bed use/chemical peels?</p>
                            <fieldset id="sunbathing" style="min-width: 102px;">
                                <input type="radio" id="sunbathing_Yes" value="Yes" name="sunbathing"><label
                                    for="sunbathing_Yes">Yes</label>&nbsp;
                                <input type="radio" id="sunbathing_No" value="No" name="sunbathing" checked><label
                                    for="sunbathing_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>

                    <div class="col-md-12">
                        <h3
                            style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                            History of cosmetic treatments</h3>
                        <p>Have you previously had any of the following treatments?</p><br>
                    </div>
                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Fillers</p>
                            <fieldset id="Fillers" style="min-width: 102px;">
                                <input type="radio" id="Fillers_Yes" value="Yes" name="Fillers"><label
                                    for="Fillers_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Fillers_No" value="No" name="Fillers" checked><label
                                    for="Fillers_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-8">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Laser Hair Removal/Skin Rejuvenation/Vein Removal</p>
                            <fieldset id="Laser_Hair_Removal" style="min-width: 102px;">
                                <input type="radio" id="Laser_Hair_Removal_Yes" value="Yes"
                                    name="Laser_Hair_Removal"><label for="Laser_Hair_Removal_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Laser_Hair_Removal_No" value="No"
                                    name="Laser_Hair_Removal" checked><label for="Laser_Hair_Removal_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Botox</p>
                            <fieldset id="Fillers" style="min-width: 102px;">
                                <input type="radio" id="Botox_Yes" value="Yes" name="Botox"><label
                                    for="Botox_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Botox_No" value="No" name="Botox" checked><label
                                    for="Botox_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-8">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Chemical Peel</p>
                            <fieldset id="Chemical_Peel" style="min-width: 102px;">
                                <input type="radio" id="Chemical_Peel_Yes" value="Yes" name="Chemical_Peel"><label
                                    for="Chemical_Peel_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Chemical_Peel_No" value="No" name="Chemical_Peel"
                                    checked><label for="Chemical_Peel_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-4">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between"
                            style="padding-right: 20px; border-right: 1px solid gray;">
                            <p>Radiofrequency</p>
                            <fieldset id="Fillers" style="min-width: 102px;">
                                <input type="radio" id="Radiofrequency_Yes" value="Yes"
                                    name="Radiofrequency"><label for="Radiofrequency_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Radiofrequency_No" value="No" name="Radiofrequency"
                                    checked><label for="Radiofrequency_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>
                    <div class="col-md-8">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Microdermabrasion</p>
                            <fieldset id="Microdermabrasion" style="min-width: 102px;">
                                <input type="radio" id="Microdermabrasion_Yes" value="Yes"
                                    name="Microdermabrasion"><label for="Microdermabrasion_Yes">Yes</label>&nbsp;
                                <input type="radio" id="Microdermabrasion_No" value="No" name="Microdermabrasion"
                                    checked><label for="Microdermabrasion_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                    </div>


                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Chaperone / Follow up</h3>
                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Do you require a chaperone?</p>
                            <fieldset id="chaperone" style="min-width: 102px;">
                                <input type="radio" id="chaperone_Yes" value="Yes" name="chaperone"><label
                                    for="chaperone_Yes">Yes</label>&nbsp;
                                <input type="radio" id="chaperone_No" value="No" name="chaperone" checked><label
                                    for="chaperone_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you happy to be contacted by us for follow up?</p>
                            <fieldset id="follow_up" style="min-width: 102px;">
                                <input type="radio" id="follow_up_Yes" value="Yes" name="follow_up"><label
                                    for="follow_up_Yes">Yes</label>&nbsp;
                                <input type="radio" id="follow_up_No" value="No" name="follow_up" checked><label
                                    for="follow_up_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Are you happy for us to take before and after pictures to use on our social media pages?</p>
                            <fieldset id="social_media" style="min-width: 102px;">
                                <input type="radio" id="social_media_Yes" value="Yes" name="social_media"><label
                                    for="social_media_Yes">Yes</label>&nbsp;
                                <input type="radio" id="social_media_No" value="No" name="social_media"
                                    checked><label for="social_media_No">No</label>
                            </fieldset>
                        </div>
                        <!--end::Group-->
                        <table style="width: 100%; margin-top: 40px;">
                            <tr>
                                <td style="padding-bottom: 0px; vertical-align: top;">
                                   
                                    <input type="hidden" name="signature" id="signature" value="">
                                    <div class="mt-2 html-content">
                                        <img data-sign-type="parent" class="sign-class" />
                                    </div>
                                     Signed:
                                </td>
                                <td style="text-align: right; padding-bottom: 0px; width: 350px;">
                                    <!--begin::Group-->
                                    <div class="form-group d-flex align-items-center justify-content-end"
                                        style="gap: 10px;">
                                        <label class="form-label">Date:</label>
                                        <input class="form-control form-control-lg " type="date" name="sign_date"
                                            placeholder="Date of birth" style="max-width: 250px;">
                                    </div>
                                    <!--end::Group-->
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Your daily skin care regime</h3>
                    <div class="col-md-12">
                        <!--begin::Group-->
                        <div class="d-flex justify-content-between">
                            <p>Do you use cleansers/toners/exfoliation/sun block</p>
                            <fieldset id="cleansers" style="min-width: 102px;">
                                <input type="radio" id="cleansers_Yes" value="Yes" name="cleansers"><label
                                    for="cleansers_Yes">Yes</label>&nbsp;
                                <input type="radio" id="cleansers_No" value="No" name="cleansers" checked><label
                                    for="cleansers_No">No</label>
                            </fieldset>
                        </div>
                    </div>
                    <h3 class="col-md-12"
                        style="text-align:left; text-decoration: underline; font-weight: bold; margin-bottom: 20px; margin-top: 18px;font-size:18px;">
                        Your skin</h3>
                    <p class="col-md-12">How would your skin react to sun exposure without the use of sun block? Tick the
                        box that applies</p>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="never_tans" id="never_tans"
                                value="never_tans"><label class="form-check-label" for="never_tans">
                                Always burns, never tans
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tans_minimally" id="tans_minimally"
                                value="tans_minimally"><label class="form-check-label" for="tans_minimally">
                                Always burns easily, tans minimally
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tans_uniformly" id="tans_uniformly"
                                value="tans_uniformly"><label class="form-check-label" for="tans_uniformly">
                                Burns moderately, tans uniformly
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tans_well" id="tans_well"
                                value="tans_well"><label class="form-check-label" for="tans_well">
                                Burns minimally, always tans well
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="tans_profusely" id="tans_profusely"
                                value="tans_profusely"><label class="form-check-label" for="tans_profusely">
                                Rarely burns, tans profusely
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Never_burns" id="Never_burns"
                                value="Never_burns"><label class="form-check-label" for="Never_burns">
                                Never burns, deeply pigmented dark brown to black skin
                            </label>
                        </div>
                    </div>
                    <p class="col-md-12">How would you describe your skin? Tick the box that applies</p>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Normal" id="Normal"
                                value="Normal"><label class="form-check-label" for="Normal">
                                Normal
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Dry" id="Dry"
                                value="Dry"><label class="form-check-label" for="Dry">
                                Dry
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Oily" id="Oily"
                                value="Oily"><label class="form-check-label" for="Oily">
                                Oily
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Sensitive" id="Sensitive"
                                value="Sensitive"><label class="form-check-label" for="Sensitive">
                                Sensitive
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Combination" id="Combination"
                                value="Combination"><label class="form-check-label" for="Combination">
                                Combination
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="Acne_prone" id="Acne prone"
                                value="Acne prone"><label class="form-check-label" for="Acne prone">
                                Acne prone
                            </label>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-12 my-2">
                        <!--begin::Group-->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </div>

                </div>
                <!--end::Row-->
            </form>

            <div class="modal fade" id="signModal" tabindex="-1" aria-labelledby="signModalLabel" aria-modal="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                    <div class="modal-content" style="margin: 0 auto; max-width: 550px;">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signModalLabel">Sign</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div style="float: right">
                                <button type="button" class="btn btn-danger" id="sig-clearBtn">Clear</button>
                                <button type="button" class="btn btn-success" id="sig-submitBtn">Save</button>
                            </div>
                            <canvas id="canvas-main" class="canvas-main"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--begin::Card body-->
    </div>
@endsection


@section('styles')
<style>
    .html-content img.sign-class {
        height: 60px;
        min-width: 100px;
        max-width: 100px;
        border: 1px dotted #888;
        cursor: pointer;
    }
    .html-content > img {
        max-width: 200px;
        height: auto;
    }
    .canvas-main {
        width: 300px;
        height: 150px;
        border: 1px solid #ccc;
        display: block;
        margin-top: 8px;
    }
</style>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            onUserTypeChange();
            updateMedicalHistoryDetailRequired();
        });

        // Medical History: require detail fields when "Yes" is selected
        var medicalHistoryPairs = [
            { yesRadio: '#taking_medicines_Yes', detailInput: '#taking_medicines_detail' },
            { yesRadio: '#allergic_to_medicines_Yes', detailInput: '#allergic_to_medicines_detail' },
            { yesRadio: '#anaphylactic_reaction_Yes', detailInput: '#anaphylactic_reaction_detail' }
        ];
        function updateMedicalHistoryDetailRequired() {
            medicalHistoryPairs.forEach(function(pair) {
                var detailInput = $(pair.detailInput);
                if ($(pair.yesRadio).is(':checked')) {
                    detailInput.prop('disabled', false).attr('required', true);
                } else {
                    detailInput.prop('disabled', true).removeAttr('required');
                    detailInput.val('');
                }
            });
        }
        $(document).on('change', 'input[name="taking_medicines"], input[name="allergic_to_medicines"], input[name="anaphylactic_reaction"]', updateMedicalHistoryDetailRequired);

        // Signature modal (from remote-parent-signature)
        $('#signModal').on('shown.bs.modal', function () {
            $('html').css('overflow', 'hidden');
        });
        $('#signModal').on('hidden.bs.modal', function () {
            $('html').css('overflow', 'unset');
            if (window.signCanvasCleanup) window.signCanvasCleanup();
        });

        $(document).on('click', '.sign-class', function () {
            $('#signModal').modal('show');
            var SIGN_TYPE = $(this).data('sign-type');
            handleSign(SIGN_TYPE);
        });

        function handleSign(_TYPE) {
            if (window.signCanvasCleanup) {
                window.signCanvasCleanup();
                window.signCanvasCleanup = null;
            }
            var canvas = document.getElementById('canvas-main');
            if (!canvas) return;

            window.requestAnimFrame = (function () {
                return window.requestAnimationFrame || window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame || window.oRequestAnimationFrame ||
                    window.msRequestAnimationFrame || function (c) { window.setTimeout(c, 1000 / 60); };
            })();

            var canvasHeight = 150;
            var canvasWidth = 300;
            canvas.height = canvasHeight;
            canvas.width = canvasWidth;

            var ctx = canvas.getContext('2d');
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 1;

            var drawing = false;
            var mousePos = { x: 0, y: 0 };
            var lastPos = mousePos;

            function getMousePos(canvasDom, e) {
                var rect = canvasDom.getBoundingClientRect();
                return { x: e.clientX - rect.left, y: e.clientY - rect.top };
            }
            function getTouchPos(canvasDom, e) {
                var rect = canvasDom.getBoundingClientRect();
                return { x: e.touches[0].clientX - rect.left, y: e.touches[0].clientY - rect.top };
            }

            function canvasmousedown(e) {
                drawing = true;
                lastPos = getMousePos(canvas, e);
            }
            function canvasmouseup(e) {
                drawing = false;
            }
            function canvasmousemove(e) {
                mousePos = getMousePos(canvas, e);
            }
            canvas.addEventListener('mousedown', canvasmousedown, false);
            canvas.addEventListener('mouseup', canvasmouseup, false);
            canvas.addEventListener('mousemove', canvasmousemove, false);

            function canvastouchmove(e) {
                var touch = e.touches[0];
                var me = new MouseEvent('mousemove', { clientX: touch.clientX, clientY: touch.clientY });
                canvas.dispatchEvent(me);
            }
            function canvastouchstart(e) {
                mousePos = getTouchPos(canvas, e);
                var touch = e.touches[0];
                var me = new MouseEvent('mousedown', { clientX: touch.clientX, clientY: touch.clientY });
                canvas.dispatchEvent(me);
            }
            function canvastouchend(e) {
                var me = new MouseEvent('mouseup', {});
                canvas.dispatchEvent(me);
            }
            canvas.addEventListener('touchmove', canvastouchmove, false);
            canvas.addEventListener('touchstart', canvastouchstart, false);
            canvas.addEventListener('touchend', canvastouchend, false);

            function renderCanvas() {
                if (drawing) {
                    ctx.moveTo(lastPos.x, lastPos.y);
                    ctx.lineTo(mousePos.x, mousePos.y);
                    ctx.stroke();
                    lastPos = mousePos;
                }
            }
            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvas();
            })();

            function clearCanvas() {
                canvas.width = canvas.width;
            }

            var sigImage = $('[data-sign-type="' + _TYPE + '"]');
            var clearBtn = document.getElementById('sig-clearBtn');
            var submitBtn = document.getElementById('sig-submitBtn');

            clearBtn.addEventListener('click', clearCanvas, false);

            function submitCanvas(e) {
                var dataUrl = canvas.toDataURL();
                $('#signature').val(dataUrl);
                sigImage.attr('src', dataUrl);

                canvas.removeEventListener('mousedown', canvasmousedown);
                canvas.removeEventListener('mouseup', canvasmouseup);
                canvas.removeEventListener('mousemove', canvasmousemove);
                canvas.removeEventListener('touchmove', canvastouchmove);
                canvas.removeEventListener('touchstart', canvastouchstart);
                canvas.removeEventListener('touchend', canvastouchend);
                clearBtn.removeEventListener('click', clearCanvas);
                submitBtn.removeEventListener('click', submitCanvas);

                $('#signModal').modal('hide');
            }
            submitBtn.addEventListener('click', submitCanvas, false);

            window.signCanvasCleanup = function () {
                canvas.removeEventListener('mousedown', canvasmousedown);
                canvas.removeEventListener('mouseup', canvasmouseup);
                canvas.removeEventListener('mousemove', canvasmousemove);
                canvas.removeEventListener('touchmove', canvastouchmove);
                canvas.removeEventListener('touchstart', canvastouchstart);
                canvas.removeEventListener('touchend', canvastouchend);
                clearBtn.removeEventListener('click', clearCanvas);
                submitBtn.removeEventListener('click', submitCanvas);
            };
        }

        function onUserTypeChange() {
            var selectedOption = $('[name="type"] option:selected');
            var selected_type = $('[name="type"]').val() ?? 'adult';
            var selectedDataText = selectedOption.data('text');
            var pat_type = selected_type.replace(/_/g, ' ');
            var formatted = pat_type
                .toLowerCase()
                .split(' ')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                .join(' ');
            $('.PatientType').text(formatted);
            $('.PatientTypeText').text(selectedDataText);
            console.log(selectedDataText);
            switch (selected_type) {
                case 'adult':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                case 'minor_surgery_ms':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                case 'aesthetics_botox':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                case 'aesthetics_filler':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                case 'aesthetics_mesotherapy':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                case 'minor_surgery_vasc':
                    $('.hide-adult').hide();
                    $('.hide-old_boy').show();
                    $('.hide-new_born').show();
                    //
                    $('.hide-adult input').removeAttr('required');
                    $('.hide-old_boy input').attr('required', true);
                    $('.hide-new_born input').attr('required', true);
                    break;

                default:
                    $('.hide-adult').show();
                    $('.hide-old_boy').hide();
                    $('.hide-new_born').hide();
                    //
                    $('.hide-adult input').attr('required', true);
                    $('.hide-old_boy input').removeAttr('required');
                    $('.hide-new_born input').removeAttr('required');
                    break;
            }
        }

        $(document).on('change', '[name="type"]', onUserTypeChange);
    </script>
@endsection
