<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "site_name"=>"DIV.IO",
            "facebook"=>"https://facebook.com",
            "github"=>"https://github.com",
            "linkedin"=>"https://linkedin.com",
            "youtube"=>"https://youtube.com",
            "about_us_content"=>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, 
                adipisci quas excepturi maxime quae totam ducimus consectetur? Lorem ipsum dolor sit amet, 
                consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, 
                repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia 
                voluptas voluptatibus, minus! Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam 
                soluta voluptatibus corporis atque iste neque sit tempora!",
        ];
    }
}
