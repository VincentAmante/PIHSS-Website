<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="./assets/styles/managePages.css">
</head>
<body>
    <main>

        <table>
            <thead>
                <tr class="row-item">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="articles-collection">

            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <a href="./addContent.php">Add Article</a>
                    </th>
                </tr>
            </tfoot>
        </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(() => {
            $.ajax({
                type: "GET",
                url: "./assets/functions/getArticleList.php",
                dataType: "html",
                success: (data) => {
                    $('#articles-collection').html(data);
                }
            })
        });
    </script>
</body>
</html>