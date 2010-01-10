<p class="nav">
<?php echo $ps->gallery_showing(); ?>
<?php echo $ps->gallery_prev_link('&#8592; Zurück'); ?>
<?php echo $ps->gallery_parent_link('Ordner nach oben'); ?> /
<?php echo $ps->album_download_url('Herunterladen'); ?>
<?php echo $ps->gallery_next_link('Vor &#8594;'); ?>
</p>

<ul class="list">
	<?php while($ps->loop()): ?>
	<li>
	     <div class="alpha-shadow"><div>
		<span><?php echo $ps->image_thumbnail_linked($ps->image_date()); ?></span>
		</div></div>
	</li>
	<?php endwhile; ?>
</ul>