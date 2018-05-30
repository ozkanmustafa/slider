
# Slider Modulü

  

Yii2 framework ile yazılan bu modül sayesinde sitenize hızlı ve pratik bir şekilde slider ekleyebilirsiniz. Kullanımı son derece basittir.

  

## Kurulum

  

Projenizin ana klasörünün altında bulunan `composer.json` adlı dosyayı açın. `repositories` kısmına

  

> {

>

> "type": "vcs",

>

> "url": "https://github.com/ozkanmustafa/slider.git"

>

> }

  

`require` kısmına

  

> "{Proje ismi}/slider": "dev-master"

  

yapıştırın. Daha sonra proje klasörünün olduğu dizinde bir komut satırı açın.

  

>php yii migrate --migrationPath=@vendor/kouosl/slider/migrations --interactive=0

komutu ile veri tabanını oluşturun.

**Portal/Backend/config** ve **Portal/Frontend/config** dizinleri altındaki `main.php`
içine 

> 'modules' => [
       'slider' => [
			'class' => 'kouosl\slider\Module',
		],

eklemelerini yapın.
  

## Slider Oluşturma

  

Modulün **index** sayfasından **Create Slider** butonuna tıklayarak açılan sayfadan yeni bir slider oluşturulabilir. Daha sonra **view** kısmından sliderın içerik sayfasına gidilip oradan yeni resimler eklenebilir. Bu kısımda **update** ve **delete** işlemi de yapabilirsiniz. Oluşturulan sliderları **view slider** butonundan anında görebilir veya **frontend/slider** sayfasından tamamına erişim sağlayabilirsiniz.

## Diğer Modüller Ve Proje Hakkında Bilgi

[github.com/kouosl/portal](https://github.com/kouosl/portal)