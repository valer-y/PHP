<?php

namespace App\Enums;

enum HttpMethod : string
{
    case Get = 'get';
    case Post = 'post';
    case Put = 'put';
    case Patch = 'patch';
    case Delete = 'delete';
    case Head = 'head';
 }