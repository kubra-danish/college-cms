<link rel="stylesheet" href="/college/public/assets/css/modules.css">

<div class="form-wrapper">
    <h2 class="page-title">Apply Faculty Leave</h2>

    <div class="form-card">
        <form method="POST">
            <div>
                <label>Leave Type</label>
                <input type="text" name="leave_type" placeholder="Enter leave type" required>
            </div>

            <div>
                <label>From Date</label>
                <input type="date" name="from_date" required>
            </div>

            <div>
                <label>To Date</label>
                <input type="date" name="to_date" required>
            </div>

            <div class="full-width">
                <label>Reason</label>
                <textarea name="reason" placeholder="Enter reason"></textarea>
            </div>

            <div class="full-width">
                <button type="submit" class="btn btn-add">Submit Leave</button>
            </div>
        </form>
    </div>

    <div class="center-btn">
        <a href="<?= BASE_URL ?>faculty-leave" class="btn btn-secondary">Back</a>
    </div>
</div>