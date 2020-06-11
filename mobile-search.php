<style>
                /*Trigger Button*/
                .login-trigger {
                    font-weight: bold;
                    color: #fff;
                    background: linear-gradient(to bottom right, #B05574, #F87E7B);
                    padding: 15px 30px;
                    border-radius: 30px;
                    position: relative;
                    top: 50%;
                }

                /*Modal*/
                h4 {
                    font-weight: bold;
                    color: white;
                }

                .close {
                    color: white;
                    transform: scale(1.2)
                }

                .modal-content {
                    font-weight: bold;
                    background: black;
                }

                .form-control {
                    margin: 1em 0;
                }

                .form-control:hover,
                .form-control:focus {
                    box-shadow: none;
                    border-color: #fff;
                }

                .username,
                .password {
                    border: none;
                    border-radius: 0;
                    box-shadow: none;
                    border-bottom: 2px solid #eee;
                    padding-left: 0;
                    font-weight: normal;
                    background: transparent;
                }

                .form-control::-webkit-input-placeholder {
                    color: #eee;
                }

                .form-control:focus::-webkit-input-placeholder {
                    font-weight: bold;
                    color: grey;
                }

                .searchmob {
                    padding: 6px 20px;
                    border-radius: 20px;
                    background: none;
                    border: 2px solid Red;
                    color: White;
                    font-weight: bold;
                    transition: all .5s;
                    margin-top: 1em;
                }

                .searchmob:hover {
                    background: #FAB87F;
                    color: #fff;
                }
            </style>
            <div id="searchmob" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-body">
                            <button data-dismiss="modal" class="close">&times;</button>
                            <h4>Search</h4>
                            <form method="POST">
                                <input type="text" name="typeahead" class="typeahead tt-query username form-control" autocomplete="off" spellcheck="false" placeholder="Search Prodcuts.." />
                                <input class="btn searchmob" name="submit" type="submit" value="SEARCH" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>