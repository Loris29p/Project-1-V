<!-- Part for just draw the diagram -->
<?php 
                if (isset($_GET['vpc'])) {
                    $vpc_id = "'".$_GET['vpc']."'";
                    ?>
                        <div id="vpc_show_aws">
                            <a>
                                <i class="fab fa-aws"></i>
                                AWS Cloud
                            </a>
                            <div class="zone_name">
                                <a>
                                    <i class="fal fa-flag"></i>
                                    <?php echo GetInfosOfVPC($_GET['vpc'])['region']; ?>
                                </a>
                                <div class="vpc_info">
                                    <a>
                                    <i class="fal fa-network-wired"></i>
                                        <?php echo GetInfosOfVPC($_GET['vpc'])['vpc']; ?>
                                        <p><?php echo GetInfosOfVPC($_GET['vpc'])['cidr']; ?></p>
                                    </a>
                                    <div id="myDiagramDiv"></div>
                                    <script src="./Src/assets/script/gojs.js"></script>
                                    <div>
                                        <script>
                                            Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>);
                                            ConstructFirstPartVPCId(<?php echo $vpc_id; ?>);
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                } elseif (isset($_GET['account']) && !isset($_GET['vpc']) && !isset($_GET['transit_gateway'])) {
                ?>
                    <div id="vpc_show_aws">
                        <a>
                            <i class="fab fa-aws"></i>
                            AWS Cloud
                        </a>
                        <div id="myDiagramDiv"></div>
                        <script src="./Src/assets/script/gojs.js"></script>
                        <div>
                            <script>
                                Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>, true);
                            </script>
                        </div>
                    </div>
                <?php
                } elseif (isset($_GET['transit_gateway'])) {
                    $transit_gateway_id = "'".$_GET['transit_gateway']."'";
                    ?>
                        <div id="vpc_show_aws">
                            <a>
                                <i class="fab fa-aws"></i>
                                AWS Cloud
                            </a>
                            <div id="myDiagramDiv"></div>
                            <script src="./Src/assets/script/gojs.js"></script>
                            <div>
                                <script>
                                    Construct(<?php echo json_encode($vpcArray); ?>, <?php echo json_encode($transitGatewayArray); ?>);
                                    ConstructFirstPartTransitGatewayId(<?php echo $transit_gateway_id; ?>);
                                </script>
                            </div>
                        </div>
                    <?php
                }
            ?>