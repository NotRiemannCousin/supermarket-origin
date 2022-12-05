<?php

enum Permission: int
{
    case SeeProducts;
    case AddProducts;
    case DeleteProducts;
    case SeeOthers;
    case EditOthers;
}
