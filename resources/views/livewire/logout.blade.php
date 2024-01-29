<div >
        <div class="flex items-center">
        <span class="text-gray-600">{{ Auth::user()->name }}</span>
        <form wire:submit.prevent="logout" class="ml-4">
            <div class="relative inline-block">
                    <button type="submit" class="btn btn-primary flex items-center">
                        <H6>Logout</H6>
                    </button>
            </div>
        </form>
    </div>
</div>

