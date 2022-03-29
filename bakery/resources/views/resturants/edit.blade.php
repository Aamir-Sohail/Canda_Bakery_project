<!-- Modal -->
<div class="modal fade" style="background-color: rgba(0,0,0,0.7)" id="breadModalEdit{{ $data->id }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: transparent !important">


            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Chnage (<strong>{{ $data->name }}</strong>) Resturant</h5>
                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                    </div>
                    <div class="card-block">
                        <form class="form-material" method="POST" action="{{ route('resturants.update') }}">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            @csrf
                            <div class="form-group  form-default form-static-label">
                                <input type="text" value="{{ $data->name }}" name="name" class="form-control"
                                    placeholder="type here..." required="true">
                                <span class="form-bar"></span>
                                <label class="float-label">Name</label>
                            </div>

                            <div class="form-group  form-default form-static-label">
                                <input type="email" value="{{ $data->email }}" name="email" class="form-control"
                                    placeholder="type here..." required="true">
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>

                            <div class="form-group  form-default form-static-label">
                                <input type="number" value="{{ $data->phone }}" name="phone" class="form-control"
                                    placeholder="type here..." required="true">
                                <span class="form-bar"></span>
                                <label class="float-label">Phone</label>
                            </div>


                            <div class="form-group form-default form-static-label">
                                <textarea class="form-control" value="{{ $data->address }}" name="address"
                                    placeholder="type here..." required="">{{ $data->address }}</textarea>
                                <span class="form-bar"></span>
                                <label class="float-label">Address</label>
                            </div>




                            <div class="form-group form-default form-static-label">
                                <button type="submit" class="btn waves-effect waves-light btn-success"><i
                                        class="ti-check-box"></i>Success Button</button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
