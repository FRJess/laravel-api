const truncateText = (summary, contentMaxLength) => {
    if(summary.length > contentMaxLength){
        return summary.substr(0, contentMaxLength) + ' ...';
    }
    return summary;
}


export { truncateText }
