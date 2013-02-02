<?php

class ProductsTest extends CDbTestCase 
{
    public $fixtures=array(
        'products'=>'Products'        
    );
    
    /**
     * Тестирование добавления продуктов 
     */
    public function testAdd() {
        $product = new Products;
        
        $product->setAttributes(array(
            'name' => 'Test product',
            'code' => 'Test code',
            'description' => 'Test description'
        ), false);
        
        $this->assertTrue($product->save(false));
        
        $product = $product->model()->findByPk($product->id);
        $this->assertTrue($product instanceof Products);
        
        $product->delete();
    }
    
}

?>
