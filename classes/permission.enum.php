<?php

enum Permission : int{
    case SeeProducts    = 0;
    case AddProducts    = 1;
    case DeleteProducts = 2;
    case SeeOthers      = 3;
    case EditOthers     = 4;
}