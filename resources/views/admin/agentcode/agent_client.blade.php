@extends('admin.layouts.app')
@section('content')
<div id="accordion">
              @foreach($result as $result)
                    <div class="card">
                      <div class="card-header"  data-toggle="collapse" data-target="#{{ $result->agentcode }}" id="headingThree">
                        <h5 class="mb-0">
                          <button class="btn btn-link collapsed" aria-expanded="false" aria-controls="collapseThree">
                              {{ $result->name }}  -  {{ $result->agentcode }} - {{ $result->mobile }}
                          </button>
                        </h5>
                      </div>
                      <div id="{{ $result->agentcode }}" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">

                          <?php
                            $client=DB::table('users')
                                    ->where('useragentcode',$result->agentcode)
                                    ->where('roleid','<=', 1)
                                    ->get();
                                   // dd($client);
                            $i=1;
                            ?>
                             <table class="table table-sm text-center">
                             <thead>
                             <tr style="background:bisque">
                             <th scope="col">#</th>
                             <th scope="col">Name</th>
                             <th scope="col">Ref Code</th>
                             <th scope="col">ID</th>
                             <th scope="col">Join Date</th>
                             <th scope="col">Action</th>
                             </tr>
                             </thead>
                             <tbody>
                               @foreach($client as $client)
                             <tr>
                             <th scope="row">{{ $i++ }}</th>
                             <td>{{ $client->name }}</td>
                             <td>{{ $client->usercode }}</td>
                             <td>{{ $client->mobile }}</td>
                             <td>{{ date('d-M-Y', strtotime($client->created_at)) }}</td>
                             <td>
                              @if($client->roleid==1)
                              <a href="{{route('clientstatus',['id'=>$client->id])}}"  title="Active">
                                  <button class="btn btn-sm btn-info">Active</button>
                              </a>
                              @elseif($client->roleid==0)
                              <a href="{{route('clientstatus',['id'=>$client->id])}}"  title="Inactive">
                                  <button class="btn btn-sm btn-danger">Deactive</button>
                                  </a>
                              @endif 
                              </td>
                             </tr>
                             @endforeach
                             </tbody>
                             </table>
                        </div>
                      </div>
                    </div>
                @endforeach
          </div>
@endsection