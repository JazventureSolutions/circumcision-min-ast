<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title ?? "Circumcision Clinic " . Auth::user()->branch->name }}</title>
    <meta name="description" content="Circumcision Clinic {{ Auth::user()->branch->name }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <style>
        @page {
            size: A4;
            @bottom-center {
                content: element(page-footer);
                font-size: 18px;
            }
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

        #page-footer {
            position: running(page-footer);
            text-align: center;
        }

    </style>

</head>

<body>
    {!! $html !!}

    @if ($has_footer)
    <div id="page-footer">
        Transcend Consulting Rooms, 98 Wentloog Road Cardiff. CF14 9DZ<br>
        Tel: 02921320800, 07956050473
    </div>
    @endif

    <script>
        setTimeout(() => {
            window.print();
        }, 1000);
    </script>

</body>

</html>
