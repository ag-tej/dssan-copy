@auth
    <div>
        @if ($message = Session::get('success'))
            <div id="toastr" class="message-box" role="alert" style="visibility: visible">
                <div class="icon text-green-500 bg-green-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Success icon</span>
                </div>
                <div class="ml-3 text-sm">{{ $message }}</div>
                <button type="button" class="close-btn" data-dismiss-target="#toastr" aria-label="Close"
                    onclick="getElementById('toastr').className = 'hidden'">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                function hideMessageBox() {
                    document.getElementById('toastr').style.visibility = "hidden";
                }
                setTimeout('hideMessageBox()', 3000);
            </script>
        @endif

        @if ($message = Session::get('info'))
            <div id="toastr" class="message-box" role="alert" style="visibility: visible">
                <div class="icon text-blue-500 bg-blue-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                        </path>
                    </svg>
                    <span class="sr-only">Info icon</span>
                </div>
                <div class="ml-3 text-sm">{{ $message }}</div>
                <button type="button" class="close-btn" data-dismiss-target="#toastr" aria-label="Close"
                    onclick="getElementById('toastr').className = 'hidden'">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                function hideMessageBox() {
                    document.getElementById('toastr').style.visibility = "hidden";
                }
                setTimeout('hideMessageBox()', 3000);
            </script>
        @endif

        @if ($message = Session::get('danger'))
            <div id="toastr" class="message-box" role="alert" style="visibility: visible">
                <div class="icon text-red-500 bg-red-100">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Error icon</span>
                </div>
                <div class="ml-3 text-sm">{{ $message }}</div>
                <button type="button" class="close-btn" data-dismiss-target="#toast-danger" aria-label="Close"
                    onclick="getElementById('toastr').className = 'hidden'">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <script>
                function hideMessageBox() {
                    document.getElementById('toastr').style.visibility = "hidden";
                }
                setTimeout('hideMessageBox()', 3000);
            </script>
        @endif
    </div>
@endauth
