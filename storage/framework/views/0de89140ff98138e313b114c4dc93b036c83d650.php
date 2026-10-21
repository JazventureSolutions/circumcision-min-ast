<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo e($title ?? 'Circumcision Clinic ' . ($branch_name ?? '')); ?></title>
    <meta name="description" content="Circumcision Clinic <?php echo e($branch_name ?? ''); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>
        @page  {
            size: A4;
        }

        html,
        body {
            height: 100%;
        }

        .pagebreak {
            page-break-after: always;
            height: 0;
            display: block;
            clear: both;
        }

        .footer-space {
            height: 50px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 18px;
            text-align: center;
            background: #fff;
        }

        img.sign-class {
            height: 60px;
            min-width: 100px;
            /* border: 1px dotted #888; */
        }

        .c-checkbox {
            display: inline-block;
            height: 15px;
            width: 15px;
            border: 1px solid #11125c;
            background-color: transparent;
            margin: 0 10px;
        }

        .c-checkbox.checked {
            background-color: #11125c;
        }

    </style>

</head>

<body>
    <?php if($has_footer): ?>
    <table style="width: 100%">
        <tbody>
            <tr>
                <td>
    <?php endif; ?>

    <?php echo $html; ?>


    <?php if($has_footer): ?>
                </td>
            </tr>
        </tbody>
        <tfoot class="footer-space"> </tfoot>
    </table>
    <?php endif; ?>

    <?php if($has_footer): ?>
    <div class="footer">
        <div style="text-align: center;"><?php echo e($address ?? ''); ?></div>
        <div style="text-align: center;">Tel: <?php echo e($tel ?? ''); ?></div>
    </div>
    <?php endif; ?>

    <script>
        setTimeout(() => {
            window.print();
        }, 1000);
    </script>

</body>

</html>
<?php /**PATH /home/u686158620/domains/temp.circumcisionclinic.net/public_html/resources/views/settings/templates/preview.blade.php ENDPATH**/ ?>