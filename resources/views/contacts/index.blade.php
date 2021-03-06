<?php use Collective\Html\HtmlFacade;?>
@extends('template.default')
@section('header')
<div class="body1">
	<div class="body2">
		<div class="body5">
			<div class="main zerogrid">
				<!-- header -->
				<header>
					@include('template.menu')
				</header>
				<!-- header end-->
			</div>
		</div>
	</div>
</div>
@stop

@section('content')
<div class="body3">
	<div class="main zerogrid">
		<!-- content -->
		<article id="content">
			<div class="wrapper row">
				<section class="col-3-4">
					<div class="wrap-col">
						<h2 class="under"><?php echo _('Contact Form')?></h2>
						<?= Form::open(array('role' => 'form','id' =>'ContactForm','action'=>'AdminController@postAddContact')) ?>
						<div>
							<div class="wrapper">
								<span><?= Form::label('name',_('Your Name:')) ?></span>
								<?= Form::text('name','',array('class'=>'input')) ?>
							</div>
							<div class="wrapper">
								<span><?= Form::label('city',_('Your City:')) ?></span>
								<?= Form::text('city','',array('class'=>'input')) ?>
							</div>
							<div class="wrapper">
								<span><?= Form::label('email',_('Your E-mail:')) ?></span>
								<?= Form::text('email','',array('class'=>'input')) ?>
							</div>
							<div class="textarea_box">
								<span><?= Form::label('message',_('Your Message:')) ?></span>
								<?= Form::textarea('message','',array('cols' => '1','rows' => '1')) ?>
							</div>
							<?= Html::link('#',_('Send'),array('onclick'=>"document.getElementById('ContactForm').submit()")) ?>
							<?= Html::link('#',_('Clear'),array('onclick'=>"document.getElementById('ContactForm').reset()")) ?>
						</div>
						<?= Form::close() ?>
					</div>
				</section>
				<section class="col-1-4">
					<div class="wrap-col">
						<h2 class="under"><?php echo _('Contacts')?></h2>

						<div id="address">
							<span><?php echo _('Country:')?><br>
								<?php echo _('City:')?><br>
								<?php echo _('Telephone:')?><br>
								<?php echo _('Email:')?></span>
							Türkiye<br>
							Samsun<br>
							+90555 555 5555<br>
							<a class="color2" href="mailto:"><?=$mainMailAddress?></a>
						</div>
					</div>
				</section>
			</div>

		</article>
	</div>
</div>
@stop
