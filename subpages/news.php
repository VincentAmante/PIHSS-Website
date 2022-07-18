<!-- News -->

<!-- Overview -->
<div class=" content-text" id="overview">
    <div class=" h1-border">
        <span></span>

        <h1 id="tab-header">News</h1>
    </div>

    <p class="tab-overview">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta! Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta!
    </p>
</div>

<!-- Content -->
<div id="news" class="news-container">
    <div class="news" id="news-gallery">
    </div>
</div> <!-- #news -->

<!-- Stylesheet -->
<link rel="stylesheet" href="./assets/css/news-events.css">
<script>

    // Calls for article galleries
    $(document).ready(() => {
        $.ajax({
            type: "GET",
            url: "../admin/assets/functions/get-articles-gallery.php",
            dataType: "html",
            success: (data) => {
                $('#news-gallery').html(data);
            }
        })
    });
</script>