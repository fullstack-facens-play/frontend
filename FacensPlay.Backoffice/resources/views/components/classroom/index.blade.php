@extends('layouts.app', ["current" => "classroom"])

@section('page-title', __('general.classroom.title'))

@section('conteudo')

         <div class="card card-primary">

            <div class="card-header">
               <a href="classroom/create" class="btn btn-sm btn-primary float-right" role="button">{{ __('general.classroom.add') }}</a>
           </div>
            <div class="card-body">
               <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                     <div class="col-sm-12 col-md-6"></div>
                     <div class="col-sm-12 col-md-6"></div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                       @if(count($classrooms) > 0)
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                           <thead>
                              <tr>
                                 <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{ __('general.id') }}</th>
                                 <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ __('general.name') }}</th>
                                 <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">{{ __('general.description') }}</th>
                                 <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"> {{ __('general.actions') }}</th>
                              </tr>
                           </thead>
                           <tbody>
                              @php

                              @endphp
                             @foreach($classrooms as $classroom)
                                @php
                                   $trclass = $trclass ?? "even";
                                   $trclass = $trclass == "odd" ? "even" : "odd";
                                @endphp

                                <tr class="{{ $trclass ?? '' }}">
                                   <td>{{ $classroom->id }}</td>
                                   <td>{{ $classroom->name }}</td>
                                   <td class="dtr-control sorting_1" tabindex="0">{{ $classroom->description }}</td>
                                   <td>
                                    @component('components.common.tables.actions', [
                                       "resourceId" => $classroom->id,
                                       "resource" => 'classroom'
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
                     "items" => $classrooms
                  ])
                  @endcomponent
               </div>
            </div>
         </div>

         </div>
            
@endsection