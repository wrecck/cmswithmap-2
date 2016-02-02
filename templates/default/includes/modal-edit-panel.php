<div id="panel-settings-edit" class="s-modal modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h5 class="modal-title"><span class="icon-m fa fa-rss"></span>Edit Panel</h5>
      </div>
      <div class="modal-body">
        <div class="row m-0">
          <div class="col-md-12">
            <div class="smc-inner">
              <form class="form-horizontal s-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Name:</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="ABC-QLD Video">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Size:</label>
                      <div class="col-sm-9">
                        <div class="app-col-size">
                          <label class="radio-inline">
                            <input type="radio" name="size" value="small"> S
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="size" value="medium"> M
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="size" value="large"> L
                          </label>
                          <label class="radio-inline">
                            <input type="radio" name="size" value="xl"> XL
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Refresh:</label>
                      <div class="col-sm-9">
                        <div class="input-group">
                          <input type="text" class="form-control" value="30">
                          <span class="input-group-addon">Seconds</span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Filter:</label>
                      <div class="col-sm-9">
                        <button data-toggle="modal" data-target="#filter-modal" type="button" class="btn btn-primary btn-sm">
                          <span class="fa fa-plus"></span> New Filter
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-3 s-form-label">Sort by:</label>
                      <div class="col-sm-9">
                        <div class="input-group input-add">
                          <input type="text" class="form-control" value="Date - newest to oldest">
                          <span class="input-group-addon close-parent">x</span>
                        </div>
                        <button data-toggle="modal" data-target="#sort-modal" class="btn btn-primary btn-sm" type="button">
                          <span class="fa fa-plus"></span> New Sort Preferences
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-md-12">
                    <div class="panel-list-group">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                          <span class="list-label list-col">
                            Category:
                          </span>
                          <span class="list-value list-col">
                            Business
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Provider:
                          </span>
                          <span class="list-value list-col">
                            ABC
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Location:
                          </span>
                          <span class="list-value list-col">
                            World > Australia > Queensland
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Content Type:
                          </span>
                          <span class="list-value list-col">
                            Video
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Date:
                          </span>
                          <span class="list-value list-col">
                            Less that 24 hours old
                          </span>
                        </li>
                        <li class="list-group-item">
                          <span class="badge fa fa-times close-parent"></span>
                           <span class="list-label list-col">
                            Curation Status:
                          </span>
                          <span class="list-value list-col">
                            New
                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="right-txt">
                      <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary btn-sm" id="panel-settings-save">Save</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->