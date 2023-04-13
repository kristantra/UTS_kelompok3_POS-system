<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


 @section('content')


 <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
<br>
  <!-- Earnings (Monthly) Card Example -->
  <div class="mb-4 col-xl-3 col-md-6">
    <div class="py-2 shadow card border-left-success h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="mr-2 col">
            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">
              Stok Barang</div>
            <div class="mb-0 text-gray-800 h5 font-weight-bold">200</div>
          </div>
          <div class="col-auto">
            <i class="text-gray-300 fas fa-dollar-sign fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Earnings (Monthly) Card Example -->
  <div class="mb-4 col-xl-3 col-md-6">
    <div class="py-2 shadow card border-left-info h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="mr-2 col">
            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">Telah Terjual
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class="mb-0 mr-3 text-gray-800 h5 font-weight-bold">50%</div>
              </div>
              <div class="col">
                <div class="mr-2 progress progress-sm">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class="text-gray-300 fas fa-clipboard-list fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Pending Requests Card Example -->
  <div class="mb-4 col-xl-3 col-md-6">
    <div class="py-2 shadow card border-left-warning h-100">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="mr-2 col">
            <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">
              Kategori Barang</div>
            <div class="mb-0 text-gray-800 h5 font-weight-bold">10</div>
          </div>
          <div class="col-auto">
            <i class="text-gray-300 fas fa-comments fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Content Row -->


<div class="row">


    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
      <div class="mb-4 shadow card">
        <!-- Card Header - Dropdown -->
        <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Stok Barang</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
            </a>
            <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>


    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
      <div class="mb-4 shadow card">
        <!-- Card Header - Dropdown -->
        <div class="flex-row py-3 card-header d-flex align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="text-gray-400 fas fa-ellipsis-v fa-sm fa-fw"></i>
            </a>
            <div class="shadow dropdown-menu dropdown-menu-right animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        {{-- <div class="card-body">
          <div class="pt-4 pb-2 chart-pie">
            <canvas id="myPieChart"></canvas>
          </div>
          <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Direct
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Social
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-info"></i> Referral
            </span>
          </div> --}}
        </div>
      </div>
    </div>
  </div>


  <!-- Content Row -->
  <div class="row">


    <!-- Content Column -->
    <div class="mb-4 col-lg-6">


      <!-- Project Card Example -->
      {{-- <div class="mb-4 shadow card">
        <div class="py-3 card-header">
          <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
        </div>
        <div class="card-body">
          <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
          <div class="mb-4 progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
          <div class="mb-4 progress">
            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
          <div class="mb-4 progress">
            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
          <div class="mb-4 progress">
            <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div> --}}
      </div>
  </div>
 @endsection


</x-app-layout>



