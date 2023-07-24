@auth
    <div id="deleteBox" class="hidden">
        <div class="fixed top-0 bg-black/20 w-full h-screen">
        </div>
        <div aria-hidden="true" class="absolute top-0 left-26 h-screen w-full flex justify-center items-center"
            onclick="document.getElementById('deleteBox').className = 'hidden'">
            <div class="p-8 rounded-uihalf shadow-sm bg-gray-50 border">
                <p class="text-gray-600 text-lg">Are you sure you want to delete?</p>
                <p class="mb-1 text-sm text-gray-500">If you delete this row, you can't recover it.</p>
                <div class="mt-6 flex items-center justify-end space-x-5">
                    <button type="button"
                        class="py-1 px-2 text-sm font-medium text-gray-600 rounded border border-gray-600 hover:bg-gray-600 hover:text-white"
                        onclick="document.getElementById('deleteBox').className = 'hidden'">
                        Cancel
                    </button>
                    <button type="button"
                        class="py-1 px-2 text-sm font-medium text-white bg-red-500 rounded hover:bg-red-700"
                        onclick='confirmDelete()'>
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
@endauth
