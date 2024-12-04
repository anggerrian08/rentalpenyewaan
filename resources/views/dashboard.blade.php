@extends('layouts.template')
@section('content') <br>
<div class="container-fluid default-dashboard">
    <div class="row">
      <div class="col-xl-12 proorder-md-10 box-col-12">
        <div class="card">
          <div class="card-header custom-border-bottom">
            <div class="header-top">
              <h4>Grafik cart</h4>
              <div class="dropdown icon-dropdown setting-menu">
                <button class="btn dropdown-toggle" id="userdropdown9" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <svg>
                    <use href="https://admin.pixelstrap.net/zono/assets/svg/icon-sprite.svg#setting"> </use>
                  </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="userdropdown9"><a class="dropdown-item" href="#">Weekly</a><a class="dropdown-item" href="#">Monthly</a><a class="dropdown-item" href="#">Yearly </a></div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="groupBarChart"></div>
            <div class="sales-data">
              <ul>
                <li>
                  <div class="total-sales">
                    <div>
                      <h5>$4,875 </h5><span>Total Sales </span>
                    </div>
                    <div class="total-reached"><span>1,00,00</span><span>85% goal reached</span></div>
                  </div>
                  <div class="progress-data">
                    <div class="progress sm-progress-bar progress-border-primary">
                      <div class="progress-bar bg-primary" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"> </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="total-sales">
                    <div>
                      <h5>$7,560</h5><span>Total Income</span>
                    </div>
                    <div class="total-reached"> <span>1,00,00</span><span>45% goal reached   </span></div>
                  </div>
                  <div class="progress-data">
                    <div class="progress sm-progress-bar progress-border-secondary">
                      <div class="progress-bar bg-secondary" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
