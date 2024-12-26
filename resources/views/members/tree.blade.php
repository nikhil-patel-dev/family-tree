<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Tree</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/themes/default/style.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        #tree {
            margin: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .jstree-themeicon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div id="tree"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.3.12/jstree.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tree').jstree({
                'core': {
                    'data': @json($treeData), 
                    'themes': {
                        'responsive': true
                    }
                },
                'plugins': ['wholerow', 'search']
            });
        });
    </script>
</body>
</html>
