import gulp from "gulp"
import browserSync from "browser-sync"
import sass from "gulp-dart-sass"
import sassGlob from "gulp-sass-glob-use-forward"
import autoPrefixer from "gulp-autoprefixer"
import plumber from "gulp-plumber"
import notify from "gulp-notify"
import shell from "gulp-shell"
import DirArchiver from "dir-archiver"

// パスの設定
const path = {
  php: "**/*.php",
  scss: "src/scss/**/*.scss",
  css: "*.css",
  js: {
    src: "src/js/**/*.js",
    dest: "js/*.js",
  },
  img: "img/**/*",
}

const isProduction = process.env.NODE_ENV === "production"

// ローカルサーバー
const serve = (cb) => {
  browserSync.init({
    proxy: process.env.WP_URL ?? "ringyo-mokuzai.test",
    ghostMode: false,
    files: [path.php, path.js.dest, path.img],
  })
  cb()
}

// CSS
const css = () =>
  gulp
    .src(path.scss)
    .pipe(plumber({ errorHandler: notify.onError("<%= error.message %>") }))
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: isProduction ? "compressed" : "expanded" }))
    .pipe(autoPrefixer())
    .pipe(gulp.dest("./"))
    .pipe(browserSync.stream())

// JS
const js = shell.task(
  `rollup -c${isProduction ? " --environment NODE_ENV:production" : ""}`
)

// ファイル監視
const watchTask = () => {
  gulp.watch(path.scss, css)
  gulp.watch(path.js.src, js)
}

// zip 生成
const zip = (cb) => {
  const archiver = new DirArchiver(".", "../ringyo-mokuzai-new.zip", false, [
    ".DS_Store",
    ".git",
    ".gitignore",
    ".vscode",
    "README.md",
    "node_modules",
    "package-lock.json",
    "package.json",
    "phpcs.xml.dist",
    ".babelrc",
    "gulpfile.js",
    "rollup.config.js",
    "src",
  ])
  archiver.createZip()
  cb()
}

// ビルド
const build = gulp.series(css, js)

// ビルド + zip 生成
const archive = gulp.series(build, zip)

// デフォルト（ビルド + サーバー起動 + 監視）
const defaultTask = gulp.series(build, gulp.parallel(serve, watchTask))

export { build, css, js, zip, archive }

export default defaultTask
