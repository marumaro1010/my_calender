        <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增記事</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form1" method="post" action="calender_act.php">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" id="datepicker" name="date" placeholder="date">
                    </div>
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input class="form-control" id="event" name="event" placeholder="event">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button"  id="send_form" class="btn btn-primary">send</button>
            </div>
            </div>
        </div>
        </div>
    </body>
</html>
