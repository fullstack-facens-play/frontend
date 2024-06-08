@if (isset($items) && (isset($enabled) && $enabled))

<div class="row">
    <div class="col-sm-12 col-md-5">
       <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Exibindo {{ $items->count() }} registros de {{ $items->total() }} ({{ $items->firstItem()}} a {{ $items->lastItem()}})</div>
    </div>
    <div class="col-sm-12 col-md-7">
       <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
          {{ $items->links() }}
       </div>
    </div>
 </div>

@endif