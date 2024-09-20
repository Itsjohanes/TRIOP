<main class="page">
  <section class="clean-block clean-form dark">
    <div class="container">
      <div class="block-heading">
        <h2 class="text-info">Pendaftaran Trinitas Open</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam
          urna, dignissim nec auctor in, mattis vitae leo.
        </p>
      </div>

              <!-- Flash messages for success or error -->
        <?php if ($this->session->flashdata('category_success')): ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('category_success') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_error')): ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('category_error') ?>
            </div>
        <?php endif; ?>

      <?= form_open_multipart('home/submit_pendaftaran'); ?>
        <div class="mb-3">
          <label class="form-label" for="nama">Nama</label>
          <input
            class="form-control"
            type="text"
            id="nama"
            name="nama"
            placeholder= "Contoh: Atep, S.T."
            data-bs-theme="light"
            required
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="sekolah">Nama Sekolah</label>
          <input
            class="form-control"
            type="text"
            id="sekolah"
            placeholder= "Contoh: SMA Trinitas"
            name="sekolah"
            required
            
            data-bs-theme="light"
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="nomor">Nomor Kontak</label>
          <input
            class="form-control"
            type="text"
            id="nomor"
            name="nomor"
            placeholder="Contoh: 08193010001032"
            required           
            data-bs-theme="light"
          />
        </div>
        <div class="mb-3">
          <label class="form-label" for="bukti">Bukti Bayar (Format .png, .jpg, .jpeg)</label>
          <input
            class="form-control"
            id="bukti"
            name="bukti"
            type="file"
            required
            accept=".png, .jpg, .jpeg"
            data-bs-theme="light"
          />
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" type="submit">Kirim</button>
        </div>
      </form>
    </div>
  </section>
</main>
