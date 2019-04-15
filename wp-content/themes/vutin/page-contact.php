<?php get_header(); 

/**
* Template Name: Page contact
*/

?>



<div class="hg-90"></div>


<?php if(have_posts()) : ?>
    <?php while (have_posts()) :  the_post(); ?>
        <section>
            <div class="banner" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) 50% 0 repeat fixed;">
                <h1 class="titlepage"><?php the_title(); ?></h1>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>



<div class="page-contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="contact-form">
				    <form method="post" class="form-mail sendformclass" action="">
				        <div class="row padd">
				            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <div class="form">
				                    <input type="text" name="fname" placeholder="Tên cơ quan" required="">
				                </div>
				            </div>
				            
				        </div>
				        <div class="row padd">
				            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <div class="form">
				                    <input type="text" name="fname" placeholder="Địa chỉ" required="">
				                </div>
				            </div>
				        </div>
				        <div class="row padd">
				            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <div class="form">
				                    <input type="text" name="fname" placeholder="Email" required="">
				                </div>
				            </div>
				        </div>
				        <div class="row padd">
				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				                <div class="form">
				                    <input name="fphone" placeholder="Phone" type="text" required=""> 
				                </div>
				            </div>
				            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				                <div class="form">
				                    <input name="fphone" placeholder="Fax" type="text" required="">
				                </div>
				            </div>
				        </div>
				        <div class="row padd">
				            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				                <div class="area">
				                    <textarea placeholder="Message" required="" style="overflow-y: hidden; display: block; position: absolute; top: 0px; left: -9999px; height: 100px; width: 748px; line-height: 20px; text-decoration: none solid rgb(51, 51, 51); letter-spacing: 0px;" tabindex="-1"></textarea>
				                </div>
				            </div>
				        </div>
				        <div class="row padd">
				            <div class="col-lg-12 col-md-12">
				                <button type="submit">Submit</button>
				            </div>
				        </div>
				    </form>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.289652400606!2d106.69648931533422!3d10.789113261908382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f354b12b591%3A0x70e71653725b7ec1!2zNTEgxJBpbmggVGnDqm4gSG_DoG5nLCDEkGEgS2FvLCBRdeG6rW4gMSwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1552317675306" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>