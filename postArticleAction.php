//JMS Serializer

    /**
     * @Route("/articles")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un article",
     *  filters={
     *      {"name"="article", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=false}
     * )
     */
    public function postArticleAction(Request $request){
        
        $serializer = SerializerBuilder::create()->build();
        
        //$jsonData = '{"id":"","name":"articleTest","price":100,"size":"S","categories":[{"id":"", "name":"categorieTest"}],"materials":[{"id":"", "name":"materialTestInsert"}],"colors":[{"id":"", "name":"color1"}],"brands":[{"id":"", "name":"brand1"}],"shops":[{"id":"", "name":"shop1", "localisation": "Marseille"}],"solded":1,"sold_by":"Toto","sold_at":"2014-11-30"}';
        $jsonData = $request->getContent();
        //file_put_contents(__DIR__."/debug_tmp", var_export($jsonData, true));

    
        
        $article = $serializer->deserialize($jsonData, Article::class, 'json');
//        dump($article);
//        die();
        
        $errors = $this->get("validator")->validate($article);
        //$form = $this->get('form.factory')->createNamed("",ArticleType::class, $article);
        //$form = $this->createForm(ArticleType::class, $article);
        
        //$form->submit($request);
        
//        dump($object);
//        die();
       
        if(count($errors) == 0){
            $em = $this->getDoctrine()->getManager();
            
            $category = $em->merge($article->getCategory());
            $article->setCategory($category);
            
            $brand = $em->merge($article->getBrand());
            $article->setBrand($brand);
            
            $shop = $em->merge($article->getShop());
            $article->setShop($shop);
            
//            $materials = $em->merge($article->getMaterials());
//            $article->setMaterials($materials);
//            
//            $colors = $em->merge($article->getColors());
//            $article->setColors($colors);
            
            $em->persist($article);
            
            $em->flush();
       
            return new JsonResponse("OK POST");
        }  else {
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }



// Formulaire

    /**
     * @Route("/articles")  
     * @Method("POST")
     * @ApiDoc(
     *  description="Ajout d'un article",
     *  filters={
     *      {"name"="article", "dataType"="string"}
     *  },
     *    output= { "class"=Article::class, "collection"=false}
     * )
     */
    public function postArticleAction(Request $request){
        
        //$serializer = SerializerBuilder::create()->build();
        
        //$jsonData = '{"id":"","name":"articleTest","price":100,"size":"S","categories":[{"id":"", "name":"categorieTest"}],"materials":[{"id":"", "name":"materialTestInsert"}],"colors":[{"id":"", "name":"color1"}],"brands":[{"id":"", "name":"brand1"}],"shops":[{"id":"", "name":"shop1", "localisation": "Marseille"}],"solded":1,"sold_by":"Toto","sold_at":"2014-11-30"}';
        $jsonData = json_decode($request->getContent(), true);
        //file_put_contents(__DIR__."/debug_tmp", var_export($jsonData, true));

//        dump($jsonData);
//        die();
        
        //$object = $serializer->deserialize($jsonData, Article::class, 'json');
//        dump($object);
//        die();
        
        $article = new Article();
        
        //$form = $this->get('form.factory')->createNamed("",ArticleType::class, $article);
        $form = $this->createForm(ArticleType::class, $article);
        
        //$form->submit($jsonData);
        
//        dump(gettype($jsonData));
//        die();
       
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            
            //$category = $em->merge($article->getCategory());
            //$article->setCategory($category);
            
            $em->persist($article);
            $em->flush();
       
            return new JsonResponse("OK POST");
        }  else {

            foreach($form->getErrors(true) as $key){
                dump($key);
            };
            die();
            
            return new JsonResponse("ERROR-NOT-VALID");
        }
        
    }