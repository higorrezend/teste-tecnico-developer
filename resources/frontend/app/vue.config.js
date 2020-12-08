module.exports = {
  "devServer": {
    "proxy": "http://localhost:8000"
  },
  "outputDir": "../../../public/",
  "publicPath": "/",
  indexPath: process.env.NODE_ENV === 'production'
    ? '../resources/views/app.blade.php'
    : 'index.html',
  "transpileDependencies": [
    "vuetify"
  ]
}