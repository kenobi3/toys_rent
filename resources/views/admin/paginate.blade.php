@if ($paginator->hasPages())
	<div class="row">
		<div class="col-sm-12 col-md-5">
			<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Отображены записи с {{ $paginator->firstItem() }} по {{ $paginator->firstItem()+$paginator->count()-1 }} из {{ $paginator->total() }}
			</div>
		</div>

<div class="col-sm-12 col-md-7">
<div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

<ul class="pagination">
	@if ($paginator->onFirstPage())
	
	<li class="paginate_button page-item previous disabled" id="example2_previous"><span class="page-link">Назад</span></li>
	
	@else
	
	<li class="paginate_button page-item previous" id="example2_previous"><a href="{{ $paginator->previousPageUrl() }}"  aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Назад</a></li>
	
	@endif
	@foreach ($elements as $element)
	@if (is_string($element))
	
	<li class="paginate_button page-item disabled"><span class="page-link">{{ $element }}</span></li>
	
	@endif
	@if (is_array($element))
	@foreach ($element as $page => $url)
	@if ($page == $paginator->currentPage())
	
	<li class="paginate_button page-item active">
		<span class="page-link">{{ $page }}</span>
	</li>
	
	@else
	
	<li class="paginate_button page-item ">
		<a href="{{ $url }}" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">{{ $page }}</a>
	</li>
	
	@endif
	@endforeach
	@endif
	@endforeach
	@if ($paginator->hasMorePages())
	
	<li class="paginate_button page-item previous" id="example2_previous"><a href="{{ $paginator->nextPageUrl() }}"  aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Вперед</a></li>
	
	@else
	
	<li class="paginate_button page-item previous disabled" id="example2_previous"><span class="page-link">Вперед</span></li>
	
	@endif
</ul>

</div>
</div>
</div>


@endif