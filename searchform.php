<div class="container">
<div class="row">
	<form class="col s12 m12 center-align" method="get"
		action="<?php echo home_url('/'); ?>">
		<div class="input-field inline col s12">
			<div class="input-field inline">
				<input id="search" type="text" name="s"
				value="<?php the_search_query(); ?>"> <label for="search">Search
				This Website</label>
			</div>
			<button class="btn waves-effect waves-light danger" type="submit"
				name="action">
				<i class="material-icons right">search</i>
			</button>
		</div>
	</form>
</div>
</div>