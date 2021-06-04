
<?php if($images) : ?>
<div class="owl-carousel owl-theme owl-pl owl-trend-items">
<?php foreach($images as $image) : ?>
        <div>
            <img src="<?= $image->fullLink ?>" alt="<?= $image->city->city ?>">
        </div>
<?php endforeach; ?>
</div>
<?php endif; ?>
<script>
    var pl = $('.owl-pl');
    pl.owlCarousel({
        loop:true,
        items: 1
    });

    $(".bt-pl.prev").on("click", function(){
        pl.trigger('prev.owl.carousel');
    });
    $('.owl-carousel').owlCarousel({
        loop:true,
        nav:false,
        items: 1,
        touchDrag: false,
        mouseDrag: false
    });

</script>

