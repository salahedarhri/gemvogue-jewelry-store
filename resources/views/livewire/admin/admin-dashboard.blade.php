<div>
    {{-- Success is as dangerous as failure. --}}
    <p class="text-lg max-md:text-md text-fourth p-3 mt-3">Dashboard</p>

    <div class="grid lg:grid-cols-3 max-lg:grid-cols-2 gap-2 p-2 font-dmsans">
        <div class="stats shadow-lg">
            <div class="stat bg-white">
                <div class="stat-title">Total Utilisateurs</div>
                <div class="stat-value">{{ $utilisateurs }}</div>
                <div class="stat-desc">21% more than last month</div>
            </div>   
        </div>
        <div class="stats shadow-lg">
            <div class="stat bg-white">
                <div class="stat-title">Total Messages</div>
                <div class="stat-value">{{ $messages }}</div>
                <div class="stat-desc">21% more than last month</div>
            </div>   
        </div>
        <div class="stats shadow-lg">
            <div class="stat bg-white">
                <div class="stat-title">Total Commandes</div>
                <div class="stat-value">{{ $commandes }}</div>
                <div class="stat-desc">21% more than last month</div>
            </div>   
        </div>

    </div>

</div>
