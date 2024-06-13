@extends('layouts.app', ["current" => "viewedclass"])

@section('page-title', __('general.viewedclass.title'))

@section('conteudo')

         <div class="card card-primary">

            <div class="card-header">
               <a href="viewedclass/create" class="btn btn-sm btn-primary float-right" role="button">{{ __('general.viewedclass.add') }}</a>
           </div>
            <div class="card-body">
               <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                     <div class="col-sm-12 col-md-6"></div>
                     <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                       @if(count($viewedclasses) > 0)
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                           <thead>
                              <tr>
                                 <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{ __('general.id') }}</th>
                                 <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ __('general.classroom_name') }}</th>
                                 <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ __('general.student') }}</th>
                                 <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> {{ __('general.actions') }}</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php

                              @endphp
                             @foreach($viewedclasses as $viewedclass)
                                @php
                                   $trclass = $trclass ?? "even";
                                   $trclass = $trclass == "odd" ? "even" : "odd";
                                @endphp

                                <tr class="{{ $trclass ?? '' }}">
                                   <td>{{ $viewedclass->id }}</td>
                                   <td>{{ $viewedclass->classRoom->name }}</td>
                                   <td class="dtr-control sorting_1" tabindex="0">{{ $viewedclass->student->name }}</td>
                                   <td>
                                    @component('components.common.tables.actions', [
                                       "resourceId" => $viewedclass->id,
                                       "resource" => 'viewedclass'
                                    ])
                                    @endcomponent
                                   </td>
                                </tr>
                             @endforeach
                        </table>
                        @endif
                     </div>
                  </div>
                  @component('components.common.tables.paginate', [
                     "items" => $viewedclasses
                  ])
                  @endcomponent
               </div>
            </div>
         </div>

         </div>
            
@endsection