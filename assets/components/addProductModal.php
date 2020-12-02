<div class="modal fade" id="addNewProduct">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body m-3">
                <p>Modal body text goes here.</p>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Product Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Write a description about your product."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Category</label>
                        <select class="form-control">
                            <option>Vegitables</option>
                            <option>Fruits</option>
                            <option>Dairy Products</option>
                            <option>Honey</option>
                            <option>Oil</option>
                            <option>Egg</option>
                            <option>Meat</option>
                            <option>Seafood</option>
                            <option>Desserts</option>
                            <option>Cereals</option>

                            <option>Baked goods</option>
                            <option>Dried foods</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Category</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                <label class="form-check-label" for="inlineCheckbox1">Bio</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                <label class="form-check-label" for="inlineCheckbox2">Vegan</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                                <label class="form-check-label" for="inlineCheckbox3">Vegetarian</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option3">
                                <label class="form-check-label" for="inlineCheckbox4">Non-vegetarian</label>
                            </div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" placeholder="Price in Euro">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="text" class="form-control" placeholder="Quantity">
                        </div>
                        <div class="col">
                            <label for="exampleInputEmail1">Unit</label>
                            <select class="form-control">
                                <option>Liter</option>
                                <option>Kilogram</option>
                                <option>Gram</option>
                                <option>Millilitre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
                                <label class="form-check-label" for="inlineCheckbox5">It is a processed food.</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>