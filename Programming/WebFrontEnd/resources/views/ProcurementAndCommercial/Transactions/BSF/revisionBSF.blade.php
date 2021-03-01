@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getManager')
@include('getFunction.getCurrency')
@include('getFunction.getFinanceStaff')
@include('ProcurementAndCommercial.Functions.searchBrf')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Create New BSF
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                @include('ProcurementAndCommercial.Functions.sectHeaderAsf')
                <br>
                <button type="reset" class="btn btn-danger btn-sm float-right" title="Reset">
                  <i class="fa fa-times" aria-hidden="true">Reset</i>
                </button>
                <a href="#" class="btn btn-success btn-sm float-right"><i data-toggle="modal" data-target="#mySearchBrf" class="fas fa-gift" aria-hidden="true">Search BRF</i></a>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <label class="card-title">
            ARF Detail
          </label>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
            </button>
          </div>
        </div>
        @include('ProcurementAndCommercial.Functions.sectArfDetail')
      </div>
    </div>
    <form action="">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <label class="card-title">
                Detail Bussiness Trip Settlement Form (BSF)
              </label>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                </button>
              </div>
            </div>
            <div class="card-body detailASF">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label>BRF Number</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>BRF Date</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Project Code</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Site Code</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>CFS Code</label></td>
                        <td>
                          <div class="input-group">
                            <input id="" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <table>
                      <tr>
                        <div>
                          <label>
                            <strong>Balance</strong><br>
                          </label>
                        </div>
                      </tr>
                      <tr>
                        <td><label>Total ARF</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Total BSF</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Balance</label></td>
                        <td>
                          <div class="input-group">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-body detailASF">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <table>
                      <tr>
                        <div>
                          <label>
                            <strong>Expense Claim</strong><br>
                          </label>
                        </div>
                      </tr>
                      <tr>
                        <td><label>QTY</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 43px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Price</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 43px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Total</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 43px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <table>

                      <tr>
                        <div>
                          <label>
                            <strong>Amount Due to Company</strong><br>
                          </label>
                        </div>
                      </tr>
                      <tr>
                        <td><label>QTY</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 23px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Price</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 23px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Total</label></td>
                        <td>
                          <div class="input-group" style="padding-left: 23px;">
                            <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <br>
                  <button type="reset" class="btn btn-danger btn-sm float-right" title="Reset">
                    <i class="fa fa-times" aria-hidden="true">Cancel Add</i>
                  </button>
                  <a href="#" class="btn btn-success btn-sm float-right"><i class="fas fa-plus" aria-hidden="true">Add to List Cart</i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <nav class="w-100">
      <div class="nav nav-tabs" id="product-tab" role="tablist">
        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="true"><span style="font-weight:bold;padding:40px;color:black;">Amount Due to Company Cart</span></a>&nbsp&nbsp&nbsp
        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="false"><span style="font-weight:bold;padding:40px;color:black;">Expense Claim Cart</span></a>
      </div><br>
    </nav>

    <div class="tab-pane fade show active" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0" style="height: 230px;" id="amountCompanyCart">
              <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>No Trans</th>
                    <th>Work Id</th>
                    <th>Work Name</th>
                    <th>Product ID</th>
                    <th>Name Material</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>QTY</th>
                    <th>Total Price</th>
                    <th>Description</th>
                    <th>CFS Code</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0" style="height: 230px;" id="expenseClaimCart">
              <table id="editableAsf" class="table table-head-fixed text-nowrap table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>No Trans</th>
                    <th>Work ID</th>
                    <th>Work Name</th>
                    <th>Product ID</th>
                    <th>Name Material</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>QTY</th>
                    <th>Total Price</th>
                    <th>Description</th>
                    <th>CSF Code</th>
                  </tr>
                </thead>
                <tbody id="tableAsfDetail"></tbody>
              </table>
            </div>
          </div>
          <button type="reset" class="btn btn-danger btn-sm float-right">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancel BSF List (Cart)
          </button>
          <button type="submit" class="btn btn-success btn-sm float-right">
            <i class="fa fa-save" aria-hidden="true"></i>
            Save BSF List(Cart)
          </button>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('ProcurementAndCommercial.Functions.footerFunctionAsf')
@endsection