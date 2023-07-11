@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            LIST OF USER STORIES CASES
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">CASE</th>
                            <th scope="col">SEE TABLE</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chats as $chat)
                        <tr class="">
                            <td scope="row">{{ $chat->titulo }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $chat->id }}">
                                    view
                                </button>

                                <div class="modal fade" id="exampleModal{{ $chat->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $chat->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel{{ $chat->id }}">{{ $chat->titulo }}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          {{ $chat->detalle_historia }}
                                          <hr>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No. History</th>
                                                        <th scope="col">Points</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($chat->tabla() as $clave)
                                                            @php
                                                                $res=explode(":", $clave)
                                                            @endphp
                                                    
                                                            @if (isset($res[1]) && isset($res[0]))
                                                            
                                                            <tr class="">
                                                                <td scope="row">{{ $res[0] }}</td>
                                                                <td>{{ $res[1]??'' }} Points</td>
                                                            </tr>
                                                            @endif
            
                                                    @endforeach
                                                    

                                                </tbody>
                                            </table>
                                        </div>
                                        
                                         
                                        
                                            
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>


                            </td>
                            <td class="">
                                <a class="btn btn-danger" href="{{ route('eliminar',$chat->id) }}" onclick="return confirm('Are you sure to delete?')">X</a>

                            </td>
                        </tr>
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
                
        </div>
        
    </div>
@endsection