<?= $this->extend('layouts/main_layout') ?>

<?= $this->section('title') ?>
ایجاد تیکت جدید
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="ticket-container">
    <div class="ticket-form">
        <h2>ایجاد تیکت جدید</h2>
        <form method="POST" action="<?= base_url('tickets/store') ?>" enctype="multipart/form-data">
            <!-- Subject Input -->
            <div class="mb-3">
                <label for="title" class="form-label">موضوع</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="موضوع تیکت خود را وارد کنید" required>
            </div>
            
            <!-- Hidden Status Input -->
            <input type="hidden" class="form-control" id="status" name="status" value="open">

            <!-- Department Select Box -->
            <div class="mb-3">
                <label for="department" class="form-label">بخش</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="فروش">فروش</option>
                    <option value="پشتیبان فنی">پشتیبان فنی</option>
                </select>
            </div>

            <!-- Description Input -->
            <div class="mb-3">
                <label for="question" class="form-label">توضیحات</label>
                <textarea class="form-control" id="question" name="question" rows="4" placeholder="توضیحات مشکل خود را وارد کنید" required></textarea>
            </div>

            <!-- Attachment Input -->
            <div class="mb-3">
                <label for="attachment" class="form-label">فایل ضمیمه</label>
                <input type="file" class="form-control" id="attachment" name="attachment" accept="image/*,application/pdf,application/zip,.doc,.docx,.txt" />
                <small class="form-text text-muted">فایل‌های تصویری، PDF، فشرده و متنی پشتیبانی می‌شوند.</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">ایجاد تیکت</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
