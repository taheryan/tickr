<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
تیکت شما
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <!-- Ticket Section -->
    <div class="card mb-4">
        <div class="card-header flexit">
            <h4 class="card-title"><?= esc($ticket['title']) ?></h4>
            <?php if ($ticket['status'] === 'open'): ?>
                <a href="<?= base_url('/tickets/close/' . $ticket['id']) ?>">
                    <button type="submit" class="btn btn-danger my-3">بستن تیکت</button>
                </a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <p><strong>وضعیت:</strong> <?= esc($ticket['status']) ?></p>
            <p><strong>بخش:</strong> <?= esc($ticket['department']) ?></p>
            <p><strong>کاربر ایجاد کننده:</strong> <?= esc($user['username']) ?> (<?= esc($user['role']) ?>)</p>
            <p><strong>ایجاد شده در:</strong> <?= esc($ticket['created_at']) ?></p>
            <p><strong>توضیحات:</strong> <?= esc($ticket['question']) ?></p>
            <a href="<?= 'http://localhost/tickr/public/' . $ticket['attachment'] ?>"><strong>فایل پیوست شده</strong></a>
        </div>
    </div>

    <!-- Responses Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>پاسخ ها</h5>
        </div>
        <div class="card-body">
            <?php if (!empty($responses)): ?>
                <!-- Loop through responses -->
                <?php foreach ($responses as $response): ?>
                    <div class="media mb-3">
                        <div class="media-body">
                            <div class="bg-light p-3 rounded">
                                <p><strong><?= esc($response['username']) ?> (<?= esc($response['role']) ?>):</strong> <?= esc($response['answer']) ?></p>
                                <small class="text-muted"><?= esc($response['created_at']) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>هیچ پاسخی برای این تیکت وجود ندارد.</p>
            <?php endif; ?>
        </div>
    </div>


    <!-- New Response Form -->
    <div class="card">
        <div class="card-header">
            <h5>ارسال پاسخ جدید</h5>
        </div>
        <div class="card-body">
            <form action="<?= base_url('/tickets/respond/' . $ticket['id']) ?>" method="POST">
                <?= csrf_field() ?> <!-- CSRF protection -->

                <div class="form-group">
                    <label for="response" class="form-label">پاسخ شما:</label>
                    <textarea class="form-control" id="response" name="response" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary my-3">ارسال پاسخ</button>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection() ?>