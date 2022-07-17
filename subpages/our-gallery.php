<!-- Our Gallery -->

<!-- Overview -->
<div class=" content-text" id="overview">
    <div class=" h1-border">
        <span></span>

        <h1 id="tab-header">Our Gallery</h1>
    </div>

    <p class="tab-overview">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta! Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        Sunt dolorum odio corporis soluta ratione!
        Totam sint corporis doloribus asperiores soluta!
    </p>
</div>

<!-- Content -->
<div class="container custom-scrollbar" id="gallery-pages">

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(() => {
        $.ajax({
            type: "GET",
            url: "./admin/assets/functions/get-galleries.php",
            dataType: "html",
            success: (data) => {
                $('#gallery-pages').html(data);
            }
        })
    });
</script>