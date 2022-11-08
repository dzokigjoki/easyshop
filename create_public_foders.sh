#!/bin/bash

mkdir -p public/uploads/redactor_articles
mkdir -p public/uploads/redactor_blogs
mkdir -p public/uploads/redactor_categories
mkdir -p public/uploads/watermark
mkdir -p public/uploads/products_temp_images
mkdir -p public/uploads/category
mkdir -p public/uploads/products
mkdir -p public/uploads/suppliers
mkdir -p public/uploads/posts
# chown -R www-data:www-data ./*
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
chmod -R 770 public/uploads/
