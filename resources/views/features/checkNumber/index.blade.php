@extends('features.checkNumber.main')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="flex justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-submit-check">
                                @csrf
                                <div class="mb-3">
                                    <label for="number" class="form-label">Enter Your NUmber</label>
                                    <input type="number" class="form-control" id="number" placeholder="2"
                                        name="number">
                                    <span class="error text-danger d-none"></span>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm">Check</button>
                                </div>
                            </form>
                        </div>
                        <div id="result" class="px-4 ">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/scripts/validation.js') }}"></script>
    <script>
        $("body").on("submit", "#form-submit-check", function(e) {
            $("#result").html("");
            e.preventDefault();
            // Create a FormData object to store the form data
            var formData = new FormData(this);

            // Send an AJAX request to upload the image
            $.ajax({
                url: "{{ route('checkNumber.post') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log("response: " + JSON.stringify(response));
                    $("#result").html(response);
                },
                error: function(response) {
                    // handler error validation
                    printErrorMsg(response);
                },
            });
        });
    </script>
@endpush
