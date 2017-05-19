<div class="row border" style="margin: 0">
	<form class="col s12 white" id="search-form" method="get">
		<div class="input-field col s10">
			<input id="search_pkl_keyword" type="text" class="validate">
			<label for="last_name">Cari PKL</label>
		</div>
		<div class="input-field col s2">
			<button class="btn btn-flat waves-effect waves-light" type="submit" name="action" style="padding: 0 1rem">
				<i class="material-icons">search</i>
			</button>
		</div>		 
	</form>
</div>


<div id="search-result-empty" class="center white" style="display: none;padding:20px">
	PKL tidak ditemukan
</div>

<ul class="collection with-header" id="search-result" style="margin: 0;display: none">
	<li class="collection-header"><h6>Hasil Pencarian</h6></li>
	<div id="search-result-item">
	</div>
</ul>