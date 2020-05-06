<style>
.grid-test {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
  width: 100%;
}
.testimonial_box {
  width: 550px;
  /* border: 3px solid #557278; */
  box-shadow: 1px 1px 2px #557278;
  padding: 1em;
  border-radius: 5px;
  background: #f1f1f1;
  margin: 1rem;
}
.testimonial_box h5 {
  font-size: 1.4rem;
  display: inline-block;
  padding-left: 1rem;
}
.testimonial_box blockquote {
  margin: 0.5em 0 0.5em 0;
  padding-left: 1rem;
  font-style: italic;
}
.testimonial_box cite {
  font-size: 12px;
  color: #999;
}
</style>

<div class="grid-test">
  <?php foreach ($data as $t) : ?>
    <div class="testimonial_box">
      <div>
          <img src="<?= $t['img']; ?>" alt="<?= $t['author']; ?>" width="50px" />
          <h5><?= $t['author']; ?></h5>
      </div>
      <div class="testimonial__quote">
        <blockquote>
          <?= $t['quote']; ?>
        <cite><?= $t['cite']; ?></cite>
        </blockquote>
      </div>
    </div>
  <?php endforeach; ?>
</div>