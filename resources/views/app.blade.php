@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" @click="option=1" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab" aria-controls="nav-users" aria-selected="true">Registro de Usuarios</a>
                        <a class="nav-item nav-link" @click="option=2" id="nav-emails-tab" data-toggle="tab" href="#nav-emails" role="tab" aria-controls="nav-emails" aria-selected="false">Registro de Correos</a>
                        <a class="nav-item nav-link" @click="option=3" id="nav-queue-tab" data-toggle="tab" href="#nav-queue" role="tab" aria-controls="nav-queue" aria-selected="false">Cola de Correos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                        <template v-if="option==1">
                            <register-users></register-users>
                        </template>
                    </div>
                    <div class="tab-pane fade" id="nav-emails" role="tabpanel" aria-labelledby="nav-emails-tab">
                        <template v-if="option==2">
                            <register-emails :current-user='{!! Auth::user()->id  !!}'></register-emails>
                        </template>
                    </div>
                    <div class="tab-pane fade" id="nav-queue" role="tabpanel" aria-labelledby="nav-queue-tab">
                        <template v-if="option==3">
                            <queue></queue>
                        </template>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


</div>



@endsection