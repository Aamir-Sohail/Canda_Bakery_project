<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" style="background-color: rgba(0,0,0,0.7)" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: transparent !important">


            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h5>Registration Of Bread Types</h5>
                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                    </div>
                    <div class="card-block">
                        <form class="form-material" method="POST" action="{{ route('bread.store') }}">
                            @csrf
                            <div class="form-group  form-default form-static-label">
                                <input type="text" name="type" class="form-control" placeholder="type hred..."
                                    required="true">
                                <span class="form-bar"></span>
                                <label class="float-label">Type</label>
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
</div>
