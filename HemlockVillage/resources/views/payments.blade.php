<html>
    <head>
        <title>Payments</title>

        <link rel="stylesheet" href="{{ asset("./css/mainstyle.css") }}">

        <script src="{{ asset("./js/navigator.js") }}"></script>
        <script src="{{ asset("./js/payment.js") }}"></script>
    </head>

    <body>
        <div class="container">
            <h1>Payments</h1>

            @php
                $accessLevel = Auth::user()->role->access_level;
            @endphp

            {{-- Success --}}
            @if (session('message'))
                <div>
                    {{ session('message') }}
                </div>
            @endif

            <form
                {{-- For family --}}
                @if(isset($accessLevel) && $accessLevel == 6 && isset($patientId))
                    action="/payment/{{ $patientId }}"
                    method="post"
                @endif
            >
                {{-- Add token if family --}}
                @if(isset($accessLevel) && $accessLevel == 6 && isset($patientId))
                    @csrf
                    @method("patch")
                @endif

                <div class="form-group">
                    <label for="patient-id">Patient ID:</label>
                    <input type="text" name="patient_id" placeholder="Patient ID" id="patient-id"
                        @isset($patientId) value="{{ $patientId }}" @endisset
                    >

                    {{-- Error GET --}}
                    @isset($error)
                        <div>{{ $error }}</div>
                    @endisset

                    {{-- Error Patient Id PATCH  --}}
                    @error("patient_id") <div>{{ $message }}</div> @enderror
                </div>

                @isset($bill)
                    <div class="form-group">
                        <label for="total-due">Total Due:</label>
                        <p>{{ $bill }}</p>
                    </div>

                    @if(isset($accessLevel) && $accessLevel == 6 && isset($patientId))
                        <div class="form-group">
                            <label for="new-payment">New Payment:</label>
                            <input type="number" id="new-payment"
                                name="amount"
                                placeholder="{{ number_format($bill, 2) }}"
                                min="0"
                                max="{{ $bill }}"
                                step="1"
                            >
                        </div>
                        {{-- Error Amount  PATCH --}}
                        @error("amount") <div>{{ $message }}</div> @enderror

                        <button type="submit">Pay</button>
                    @endif
                @endisset
            </form>
        </div>

        @include('navbar')

    </body>
</html>
