<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="index">


<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
	
<div class="row">
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Расчет балки</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>beam"><img class="img-responsive center-block" src="/web/pages/index/140/cover_beam.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Построение розы ветров</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>info/e_veter"><img class="img-responsive center-block" src="/web/pages/index/140/cover_veter.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Объемы земляных работ</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>calc/e_ground_works"><img class="img-responsive center-block" src="/web/pages/index/140/cover_ground_works.png" /></a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Калькулятор уклонов</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>calc/slope"><img class="img-responsive center-block" src="/web/pages/index/140/cover_slope.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Конвертер величин</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>converter"><img class="img-responsive center-block" src="/web/pages/index/140/cover_converter.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Сертификаты на материалы</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>certificates"><img class="img-responsive center-block" src="/web/pages/index/140/cover_certificates.png" /></a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Вес арматуры</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>calc/armatura"><img class="img-responsive center-block" src="/web/pages/index/140/cover_armatura.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Подбор элементов колодца</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>e_kolodec"><img class="img-responsive center-block" src="/web/pages/index/140/cover_kolodec.png" /></a>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Калькулятор металлопроката</h3>
				<div class="box-tools pull-right">
					<span class="label label-danger">New!</span>
				</div>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>kalkulyator_metalloprokata"><img class="img-responsive center-block" src="/web/pages/index/140/cover_calc_metall.png" /></a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-4">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Расчет объема воды в трубе</h3>
			</div>
			<div class="box-body">
				<a href="<?=base_url();?>calc/volume_pipes"><img class="img-responsive center-block" src="/web/pages/index/140/cover_volume_pipes.png" /></a>
			</div>
		</div>
	</div>
</div>

<?
if ($result) { // если форма была отправлено удачно
?>
<script>
$(document).ready(function() {	
  alert("Заявка успешно отправлена");
});
</script>
<?
}
?>
<style>
.error {
    color: red;
}
</style>

</div>

</div>





<div class="row">
	<div class="col-md-12">
	    <div class="box box-primary">
	        <div class="box-header">
	            <h3 class="box-title">Опрос. Выберите Ваш основной вид деятельности</h3>
	        </div>
	        <div class="box-body">
	            <div id="pollcontainer"></div>
				<p id="loader" >Загрузка...</p>
				<input type="text" id="poll_id" value="<?=$poll_id?>" style="display: none;" />
	        </div>
	    </div>
	</div>
</div>



<div class="row">
	<div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                <h3 class="box-title">Что Вы думаете о новом дизайне сайта?</h3>
              </div><!-- /.box-header -->
              <div class="box-body">
                <div id="disqus_thread"></div>
        <script>
            /**
             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
             */
            /*
            var disqus_config = function () {
                this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() {  // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                
                s.src = '//stroydocs.disqus.com/embed.js';
                
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        </script>
        			</div>
        		</div>
	</div>
</div>


</div>

<script src="<?=base_url();?>web/pages/polls/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/pages/polls/style.css"/>


<script src="<?=base_url();?>web/pages/index/app.js"></script>
<link rel="stylesheet" href="<?=base_url();?>web/pages/index/style.css"/>