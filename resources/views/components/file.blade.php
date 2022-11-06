<i class="{{ $size }} fa
@if($drive->extension === "csv")
    fa-file-csv text-success
@elseif($drive->extension === "txt")
    fa-file-alt text-primary
@elseif($drive->extension === "pdf")
    fa-file-pdf text-danger
@elseif($drive->extension === "jpg" || $drive->extension === "png" || $drive->extension === "jpeg" )
    fa-image text-dark
@elseif(
    $drive->extension === "html" || $drive->extension === "json" ||
     $drive->extension === "php" ||$drive->extension === "js"
    )
    fa-code text-danger
@elseif($drive->extension === "ico")
    fa-icons text-secondary
    @endif
    ">
</i>
